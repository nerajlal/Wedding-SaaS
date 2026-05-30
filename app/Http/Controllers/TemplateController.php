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
