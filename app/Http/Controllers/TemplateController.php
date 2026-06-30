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
                'id' => 'heartfeltcollage',
                'name' => 'Heartfelt Collage',
                'hint' => 'Romantic heart grid photo collage',
                'image' => '/template_thumbnails/heartfeltcollage.png',
            ],
            [
                'id' => 'seaside-promise',
                'name' => 'Seaside Promise',
                'hint' => 'Elegant beach aesthetic',
                'image' => '/template_thumbnails/seaside-promise.png',
            ],
            // New Templates
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
            [
                'id' => 'celestial-navy',
                'name' => 'Celestial Navy',
                'hint' => 'Midnight blue dark theme with celestial gold detailing',
                'image' => '/template_thumbnails/celestial-navy.png',
            ],
            [
                'id' => 'gatsby-luxury',
                'name' => 'Gatsby Luxury',
                'hint' => 'Art Deco style with obsidian & metallic gold',
                'image' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=400&q=80',
            ],
            [
                'id' => 'enchanted-forest',
                'name' => 'Enchanted Forest',
                'hint' => 'Earthy deep emerald & botanical gold',
                'image' => 'https://images.unsplash.com/photo-1448375240586-882707db888b?auto=format&fit=crop&w=400&q=80',
            ],
        ];
    }

    public function index()
    {
        $templates = $this->getTemplates();
        return view('wedding.templates', compact('templates'));
    }

    public function show($id)
    {
        $templates = $this->getTemplates();
        $resolvedId = $this->resolveTemplateAlias($id);
        $template = collect($templates)->firstWhere('id', $resolvedId);

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

        return view('wedding.template-preview', compact('template', 'existingInvitation'));
    }

    private function resolveTemplateAlias(string $template): string
    {
        return $template;
    }
}
