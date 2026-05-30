<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeddingDetailsController extends Controller
{
    /**
     * Show the dedicated wedding creation landing page (bigdates-style).
     */
    public function entryWedding()
    {
        return view('wedding-flow');
    }

    /**
     * Accept all wizard steps in ONE single POST (from the JS wizard).
     * Stores everything in session and redirects to the published page.
     */
    public function storeAll(Request $request)
    {
        $validated = $request->validate([
            'bride_name'       => 'required|string|max:255',
            'groom_name'       => 'required|string|max:255',
            'wedding_date'     => 'required|string',
            'time'             => 'required|string',
            'venue_name'       => 'required|string|max:255',
            'venue_address'    => 'required|string',
            'rsvp_contact'     => 'required|string',
            'rsvp_deadline'    => 'nullable|string',
            'dress_code'       => 'nullable|string',
            'personal_message' => 'nullable|string|max:200',
            'template'         => 'required|string|in:royal-scroll,golden-minimalist,garden-celestial',
            'couples_photo'    => 'nullable|image|max:5120',
        ]);

        $template = $validated['template'];
        unset($validated['template']);

        session(['wedding_details'  => $validated]);
        session(['wedding_template' => $template]);

        if ($request->hasFile('couples_photo')) {
            $file   = $request->file('couples_photo');
            $base64 = base64_encode(file_get_contents($file->getRealPath()));
            $mime   = $file->getMimeType();
            session(['wedding_photo' => "data:$mime;base64,$base64"]);
        }

        return redirect()->route('wedding.published.show');
    }

    /**
     * Show the legacy wedding details form (Step 1) — kept for backward compatibility.
     */
    public function create()
    {
        return view('wedding-details');
    }

    /**
     * Store the wedding details in session and redirect to Step 2.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'wedding_date' => 'required|string',
            'time' => 'required|string',
            'venue_name' => 'required|string|max:255',
            'venue_address' => 'required|string',
            'rsvp_deadline' => 'nullable|string',
            'rsvp_contact' => 'required|string',
            'dress_code' => 'nullable|string',
            'personal_message' => 'nullable|string|max:200',
            'couples_photo' => 'nullable|image|max:5120',
        ]);

        // Save text details in session
        session(['wedding_details' => $validated]);

        // Handle photo upload (convert to Base64 data URL for easy portable rendering)
        if ($request->hasFile('couples_photo')) {
            $file = $request->file('couples_photo');
            $base64 = base64_encode(file_get_contents($file->getRealPath()));
            $mime = $file->getMimeType();
            session(['wedding_photo' => "data:$mime;base64,$base64"]);
        }

        return redirect()->route('wedding.template.show');
    }

    /**
     * Show the template selection form (Step 2).
     */
    public function showTemplate()
    {
        if (!session()->has('wedding_details')) {
            return redirect()->route('wedding.details.create');
        }

        $details = session('wedding_details');
        $photo = session('wedding_photo');

        return view('wedding-template', compact('details', 'photo'));
    }

    /**
     * Store the template selection in session and redirect to Step 3.
     */
    public function storeTemplate(Request $request)
    {
        $request->validate([
            'template' => 'required|string|in:royal-scroll,golden-minimalist,garden-celestial',
        ]);

        session(['wedding_template' => $request->input('template')]);

        return redirect()->route('wedding.preview.show');
    }

    /**
     * Show the live invitation preview (Step 3).
     */
    public function showPreview()
    {
        if (!session()->has('wedding_details') || !session()->has('wedding_template')) {
            return redirect()->route('wedding.details.create');
        }

        $details = session('wedding_details');
        $photo = session('wedding_photo');
        $template = session('wedding_template');

        return view('wedding-preview', compact('details', 'photo', 'template'));
    }

    /**
     * Show the published success sharing page.
     */
    public function showPublished()
    {
        if (!session()->has('wedding_details')) {
            return redirect()->route('wedding.details.create');
        }

        $details = session('wedding_details');
        $template = session('wedding_template', 'royal-scroll');
        $photo = session('wedding_photo');

        // Dynamically save details to a public JSON store so guest devices/phones can read it without active builder session cookies
        $slug = \Illuminate\Support\Str::slug($details['bride_name'])
            . '-' . \Illuminate\Support\Str::slug($details['groom_name'])
            . '-' . now()->format('YmdHis');
        $publicUrl = url('/invite/' . $slug);
        
        $path = storage_path('app/public/invitations.json');
        $invitations = [];
        if (file_exists($path)) {
            $invitations = json_decode(file_get_contents($path), true) ?: [];
        }
        
        $invitations[$slug] = [
            'details' => $details,
            'template' => $template,
            'photo' => $photo,
            'updated_at' => now()->toDateTimeString()
        ];
        
        if (!is_dir(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }
        
        file_put_contents($path, json_encode($invitations, JSON_PRETTY_PRINT));

        return view('wedding-published', compact('details', 'template', 'slug', 'publicUrl'));
    }

    /**
     * Show the public invitation page for guests.
     */
    public function showPublicInvitation($slug)
    {
        $path = storage_path('app/public/invitations.json');
        $invitations = [];
        if (file_exists($path)) {
            $invitations = json_decode(file_get_contents($path), true) ?: [];
        }

        if (isset($invitations[$slug])) {
            $details = $invitations[$slug]['details'];
            $template = $invitations[$slug]['template'];
            $photo = $invitations[$slug]['photo'] ?? null;
        } else {
            // Fallback to active session
            if (session()->has('wedding_details')) {
                $details = session('wedding_details');
                $template = session('wedding_template', 'royal-scroll');
                $photo = session('wedding_photo');
            } else {
                $details = [
                    'bride_name' => 'Priya Sharma',
                    'groom_name' => 'Rahul Verma',
                    'wedding_date' => '2026-06-20',
                    'time' => '19:00',
                    'venue_name' => 'The Grand Palace Ballroom',
                    'venue_address' => '123 Royal Road, Jaipur, Rajasthan',
                    'rsvp_contact' => '+91 98765 43210',
                    'rsvp_deadline' => '2026-06-01',
                    'dress_code' => 'formal_attire',
                    'personal_message' => 'With joy in our hearts, we welcome you to celebrate this union'
                ];
                $template = 'royal-scroll';
                $photo = null;
            }
        }

        return view('wedding-public', compact('details', 'template', 'photo'));
    }
}
