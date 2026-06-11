<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeddingDetailsController extends Controller
{
    private function formatDriveUrl($url)
    {
        if (!$url) return null;
        if (preg_match('/drive\.google\.com\/file\/d\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
            return 'https://drive.google.com/uc?export=view&id=' . $matches[1];
        }
        return $url;
    }
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
            'bride_name'            => 'required|string|max:255',
            'groom_name'            => 'required|string|max:255',
            'wedding_date'          => 'required|string',
            'time'                  => 'required|string',
            'venue_name'            => 'required|string|max:255',
            'venue_address'         => 'required|string',
            'rsvp_contact'          => 'required|string',
            'rsvp_deadline'         => 'nullable|string',
            'dress_code'            => 'nullable|string',
            'personal_message'      => 'nullable|string|max:200',
            'expected_guest_count'  => 'nullable|integer|min:1',
            'guest_notes'           => 'nullable|string|max:1000',
            'template'              => 'required|string',
            'couples_photo'         => 'nullable|image|max:5120',
            'main_image'            => 'nullable|image|max:5120',
            'groom_image'           => 'nullable|image|max:5120',
            'bride_image'           => 'nullable|image|max:5120',
            'accent_image'          => 'nullable|image|max:5120',
            'gallery_images'        => 'nullable|array',
            'gallery_images.*'      => 'nullable|image|max:5120',
            'location_url'          => 'nullable|url|max:500',
        ]);

        $template = $validated['template'];
        unset($validated['template']);
        unset($validated['gallery_urls']);
        unset($validated['main_image'], $validated['groom_image'], $validated['bride_image'], $validated['accent_image'], $validated['gallery_images'], $validated['couples_photo']);

        $photoBase64 = null;
        if ($request->hasFile('couples_photo')) {
            $file   = $request->file('couples_photo');
            $base64 = base64_encode(file_get_contents($file->getRealPath()));
            $mime   = $file->getMimeType();
            $photoBase64 = "data:$mime;base64,$base64";
            session(['wedding_photo' => $photoBase64]);
        }

        $slug = \Illuminate\Support\Str::slug($validated['bride_name'])
            . '-' . \Illuminate\Support\Str::slug($validated['groom_name'])
            . '-' . now()->format('YmdHis');

        $mainImageUrl = $request->hasFile('main_image') ? '/storage/' . $request->file('main_image')->store('invitations', 'public') : ($request->input('existing_main_image_url') ?: null);
        $groomImageUrl = $request->hasFile('groom_image') ? '/storage/' . $request->file('groom_image')->store('invitations', 'public') : ($request->input('existing_groom_image_url') ?: null);
        $brideImageUrl = $request->hasFile('bride_image') ? '/storage/' . $request->file('bride_image')->store('invitations', 'public') : ($request->input('existing_bride_image_url') ?: null);
        $accentImageUrl = $request->hasFile('accent_image') ? '/storage/' . $request->file('accent_image')->store('invitations', 'public') : ($request->input('existing_accent_image_url') ?: null);

        $invitation = \App\Models\Invitation::create(array_merge($validated, [
            'slug' => $slug,
            'template' => $template,
            'photo' => $photoBase64,
            'user_id' => auth()->id(),
            'main_image_url' => $mainImageUrl,
            'groom_image_url' => $groomImageUrl,
            'bride_image_url' => $brideImageUrl,
            'accent_image_url' => $accentImageUrl,
        ]));

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if ($file) {
                    $path = '/storage/' . $file->store('invitations', 'public');
                    $invitation->galleries()->create([
                        'image_url' => $path
                    ]);
                }
            }
        }

        if ($request->has('existing_gallery_images')) {
            foreach ($request->input('existing_gallery_images') as $path) {
                if ($path) {
                    $invitation->galleries()->create([
                        'image_url' => $path
                    ]);
                }
            }
        }

        session(['wedding_details'  => $validated]);
        session(['wedding_template' => $template]);
        session(['wedding_slug'     => $slug]);

        return redirect()->route('wedding.payment.show');
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
            'bride_name'            => 'required|string|max:255',
            'groom_name'            => 'required|string|max:255',
            'wedding_date'          => 'required|string',
            'time'                  => 'required|string',
            'venue_name'            => 'required|string|max:255',
            'venue_address'         => 'required|string',
            'rsvp_deadline'         => 'nullable|string',
            'rsvp_contact'          => 'required|string',
            'dress_code'            => 'nullable|string',
            'personal_message'      => 'nullable|string|max:200',
            'expected_guest_count'  => 'nullable|integer|min:1',
            'guest_notes'           => 'nullable|string|max:1000',
            'location_url'          => 'nullable|url|max:500',
            'couples_photo'         => 'nullable|image|max:5120',
            'bride_image' => 'nullable|image|max:5120',
            'groom_image' => 'nullable|image|max:5120',
        ]);

        $brideImageUrl = $request->hasFile('bride_image') ? '/storage/' . $request->file('bride_image')->store('invitations', 'public') : null;
        $groomImageUrl = $request->hasFile('groom_image') ? '/storage/' . $request->file('groom_image')->store('invitations', 'public') : null;

        $details = array_merge($validated, [
            'bride_image_url' => $brideImageUrl,
            'groom_image_url' => $groomImageUrl,
        ]);

        // Save details in session
        session(['wedding_details' => $details]);

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
            'template' => 'required|string',
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
    public function showPublished(Request $request)
    {
        $slug = $request->query('slug');

        if (!$slug) {
            $slug = session('wedding_slug');
        }

        if (!$slug) {
            return redirect()->route('wedding.details.create');
        }

        $invitation = \App\Models\Invitation::with('galleries')->where('slug', $slug)->firstOrFail();

        $details = $invitation->toArray();
        $template = $invitation->template;
        $publicUrl = url('/invite/' . $slug);

        return view('wedding-published', compact('details', 'template', 'slug', 'publicUrl'));
    }

    /**
     * Show the public invitation page for guests.
     */
    public function showPublicInvitation($slug)
    {
        $invitation = \App\Models\Invitation::with('galleries')->where('slug', $slug)->first();

        if ($invitation) {
            $details = $invitation->toArray();
            $template = $invitation->template;
            $photo = $invitation->photo;
        } else {
            // Fallback to active session
            if (session()->has('wedding_details')) {
                $details = session('wedding_details');
                $template = session('wedding_template', 'premium-vintage');
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
                $template = 'premium-vintage';
                $photo = null;
            }
        }

        if (view()->exists('templates.' . $template)) {
            return view('templates.' . $template, compact('details', 'template', 'photo', 'invitation'));
        }

        return view('wedding-public', compact('details', 'template', 'photo', 'invitation'));
    }

    /**
     * Renders a blank/placeholder live template for the iframe preview
     */
    public function livePreview(\Illuminate\Http\Request $request, $template)
    {
        $invitation = null;
        if ($request->filled('slug')) {
            $invitation = \App\Models\Invitation::with('galleries')->where('slug', $request->slug)->first();
        }

        $details = $invitation ? $invitation->toArray() : [
            'bride_name' => 'Bride Name',
            'groom_name' => 'Groom Name',
            'wedding_date' => '2026-12-01',
            'time' => '19:00',
            'venue_name' => 'The Grand Palace',
            'venue_address' => '123 Royal Road, City',
            'rsvp_contact' => 'Your Contact',
            'personal_message' => 'Please confirm your attendance',
            'location_url' => '',
            'main_image_url' => '',
            'bride_image_url' => '',
            'groom_image_url' => '',
            'accent_image_url' => ''
        ];
        $photo = $invitation ? $invitation->photo : null;

        $resolvedTemplate = $this->resolveTemplateAlias($template);

        if (view()->exists('templates.' . $resolvedTemplate)) {
            return view('templates.' . $resolvedTemplate, compact('details', 'template', 'photo', 'invitation'));
        }

        return view('wedding-public', compact('details', 'template', 'photo', 'invitation'));
    }

    private function resolveTemplateAlias(string $template): string
    {
        return $template;
    }

    public function destroy($slug)
    {
        $invitation = \App\Models\Invitation::where('slug', $slug)->where('user_id', auth()->id())->firstOrFail();
        $invitation->delete();
        return redirect()->route('my.cards')->with('success', 'Invitation deleted successfully!');
    }

    /**
     * Show the user's created cards/invitations.
     */
    public function myCards()
    {
        $invitations = \App\Models\Invitation::where('user_id', auth()->id())->latest()->get();
        return view('my-cards', compact('invitations'));
    }

    public function edit($slug)
    {
        $invitation = \App\Models\Invitation::where('slug', $slug)->where('user_id', auth()->id())->firstOrFail();
        
        $template = [
            'id' => $invitation->template,
            'name' => ucwords(str_replace('-', ' ', $invitation->template))
        ];

        return view('template-preview', compact('template', 'invitation'));
    }

    public function updateAll(Request $request, $slug)
    {
        $invitation = \App\Models\Invitation::where('slug', $slug)->where('user_id', auth()->id())->firstOrFail();

        $validated = $request->validate([
            'bride_name'            => 'required|string|max:255',
            'groom_name'            => 'required|string|max:255',
            'wedding_date'          => 'required|string',
            'time'                  => 'required|string',
            'venue_name'            => 'required|string|max:255',
            'venue_address'         => 'required|string',
            'rsvp_contact'          => 'required|string',
            'rsvp_deadline'         => 'nullable|string',
            'dress_code'            => 'nullable|string',
            'personal_message'      => 'nullable|string|max:200',
            'expected_guest_count'  => 'nullable|integer|min:1',
            'guest_notes'           => 'nullable|string|max:1000',
            'template'              => 'required|string',
            'couples_photo'         => 'nullable|image|max:5120',
            'main_image'            => 'nullable|image|max:5120',
            'groom_image'           => 'nullable|image|max:5120',
            'bride_image'           => 'nullable|image|max:5120',
            'accent_image'          => 'nullable|image|max:5120',
            'gallery_images'        => 'nullable|array',
            'gallery_images.*'      => 'nullable|image|max:5120',
            'location_url'          => 'nullable|url|max:500',
        ]);

        $template = $validated['template'];
        unset($validated['template']);
        unset($validated['gallery_urls']);
        unset($validated['main_image'], $validated['groom_image'], $validated['bride_image'], $validated['accent_image'], $validated['gallery_images'], $validated['couples_photo']);

        $photoBase64 = $invitation->photo;
        if ($request->hasFile('couples_photo')) {
            $file   = $request->file('couples_photo');
            $base64 = base64_encode(file_get_contents($file->getRealPath()));
            $mime   = $file->getMimeType();
            $photoBase64 = "data:$mime;base64,$base64";
            session(['wedding_photo' => $photoBase64]);
        }

        $mainImageUrl = $request->hasFile('main_image') ? '/storage/' . $request->file('main_image')->store('invitations', 'public') : $invitation->main_image_url;
        $groomImageUrl = $request->hasFile('groom_image') ? '/storage/' . $request->file('groom_image')->store('invitations', 'public') : $invitation->groom_image_url;
        $brideImageUrl = $request->hasFile('bride_image') ? '/storage/' . $request->file('bride_image')->store('invitations', 'public') : $invitation->bride_image_url;
        $accentImageUrl = $request->hasFile('accent_image') ? '/storage/' . $request->file('accent_image')->store('invitations', 'public') : $invitation->accent_image_url;

        $invitation->update(array_merge($validated, [
            'template' => $template,
            'photo' => $photoBase64,
            'main_image_url' => $mainImageUrl,
            'groom_image_url' => $groomImageUrl,
            'bride_image_url' => $brideImageUrl,
            'accent_image_url' => $accentImageUrl,
        ]));

        if ($request->has('delete_galleries')) {
            $deleteIds = $request->input('delete_galleries');
            if (is_array($deleteIds)) {
                $invitation->galleries()->whereIn('id', $deleteIds)->delete();
            }
        }

        if ($request->hasFile('gallery_images')) {
            // Optional: You could delete existing galleries here if you want to replace them,
            // or just append them. We'll append them for now.
            foreach ($request->file('gallery_images') as $file) {
                if ($file) {
                    $path = '/storage/' . $file->store('invitations', 'public');
                    $invitation->galleries()->create([
                        'image_url' => $path
                    ]);
                }
            }
        }

        $sessionDetails = array_merge($validated, [
            'main_image_url' => $mainImageUrl,
            'groom_image_url' => $groomImageUrl,
            'bride_image_url' => $brideImageUrl,
            'accent_image_url' => $accentImageUrl,
        ]);

        session(['wedding_details'  => $sessionDetails]);
        session(['wedding_template' => $template]);
        session(['wedding_slug'     => $invitation->slug]);

        if ($invitation->is_paid) {
            return redirect()->route('wedding.published.show');
        }

        return redirect()->route('wedding.payment.show');
    }

    /**
     * Show dummy payment interface.
     */
    public function showPayment()
    {
        return view('payment');
    }

    /**
     * Process dummy payment and redirect to success.
     */
    public function processPayment(Request $request)
    {
        $slug = session('wedding_slug');
        if ($slug) {
            $invitation = \App\Models\Invitation::where('slug', $slug)->first();
            if ($invitation) {
                $invitation->update(['is_paid' => true]);
            }
        }
        return redirect()->route('wedding.published.show');
    }

    /**
     * Initiate payment from My Cards dashboard.
     */
    public function initiatePayment($slug)
    {
        $invitation = \App\Models\Invitation::where('slug', $slug)->where('user_id', auth()->id())->firstOrFail();
        
        session(['wedding_details'  => $invitation->details]);
        session(['wedding_template' => $invitation->template]);
        session(['wedding_slug'     => $invitation->slug]);

        return redirect()->route('wedding.payment.show');
    }
}
