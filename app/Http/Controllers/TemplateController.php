<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    private function getTemplates()
    {
        return [
            [
                'id' => 'premium-vintage',
                'name' => 'Premium Vintage',
                'hint' => 'Classic and elegant',
                'image' => '/template_thumbnails/premium-vintage.png',
            ],

            [
                'id' => 'elegant-circle',
                'name' => 'Elegant Circle',
                'hint' => 'Beautiful curved design',
                'image' => '/template_thumbnails/elegant-circle.png',
            ],
            [
                'id' => 'geometric-polaroid',
                'name' => 'Geometric Polaroid',
                'hint' => 'Modern polaroid layout',
                'image' => '/template_thumbnails/geometric-polaroid.png',
            ],

            [
                'id' => 'ethereal-glass',
                'name' => 'Ethereal Glass',
                'hint' => 'Modern glassmorphism',
                'image' => '/template_thumbnails/ethereal-glass.png',
            ],
            [
                'id' => 'simple-elegance',
                'name' => 'Simple Elegance',
                'hint' => 'Clean and minimalist',
                'image' => '/template_thumbnails/simple-elegance.png',
            ],

            [
                'id' => 'seaside-promise',
                'name' => 'Seaside Promise',
                'hint' => 'Elegant beach aesthetic',
                'image' => '/template_thumbnails/seaside-promise.png',
            ],
            // New Templates
            [
                'id' => 'heartfeltcollage',
                'name' => 'Heartfelt Collage',
                'hint' => 'Romantic heart design',
                'image' => '/template_thumbnails/heartfeltcollage.png',
            ],
            [
                'id' => 'florallovesplash',
                'name' => 'Floral Love Splash',
                'hint' => 'Brush stroke photo with blue details',
                'image' => '/template_thumbnails/florallovesplash.png',
            ],
            [
                'id' => 'lovelocked',
                'name' => 'Love Locked Cinematic',
                'hint' => 'Movie poster style with blended foreground',
                'image' => '/template_thumbnails/lovelocked.png',
            ],
            [
                'id' => 'pinkgreyelegance',
                'name' => 'Pink & Grey Elegance',
                'hint' => 'Dreamy cloud collage with greyscale background',
                'image' => '/template_thumbnails/pinkgreyelegance.png',
            ],
            [
                'id' => 'eternalposter',
                'name' => 'Eternal Poster',
                'hint' => 'Magazine style poster with sharp foreground cutout',
                'image' => '/template_thumbnails/eternalposter.png',
            ],
        ];
    }

    public function index()
    {
        $templates = $this->getTemplates();
        return view('templates', compact('templates'));
    }

    public function show($id)
    {
        $templates = $this->getTemplates();
        $template = collect($templates)->firstWhere('id', $id);

        if (!$template) {
            abort(404);
        }

        $existingInvitation = null;
        if (auth()->check()) {
            $existingInvitation = \App\Models\Invitation::with('galleries')
                ->where('user_id', auth()->id())
                ->latest()
                ->first();
        }

        return view('template-preview', compact('template', 'existingInvitation'));
    }
}
