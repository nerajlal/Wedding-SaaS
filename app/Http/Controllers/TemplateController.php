<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = [
            [
                'id' => 'royal-scroll',
                'name' => 'Royal Scroll',
                'hint' => 'Dark gold luxury',
                'image' => asset('images/templates/royal-scroll.png'),
            ],
            [
                'id' => 'golden-minimalist',
                'name' => 'Golden Minimalist',
                'hint' => 'Clean & modern',
                'image' => asset('images/templates/golden-minimalist.png'),
            ],
            [
                'id' => 'garden-celestial',
                'name' => 'Celestial',
                'hint' => 'Starlit romance',
                'image' => asset('images/templates/garden-celestial.png'),
            ],
            [
                'id' => 'classic-romance',
                'name' => 'Classic Romance',
                'hint' => 'Timeless elegance',
                'image' => 'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?auto=format&fit=crop&w=400&q=80',
            ],
            [
                'id' => 'modern-chic',
                'name' => 'Modern Chic',
                'hint' => 'Sleek and trendy',
                'image' => 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=400&q=80',
            ],
            [
                'id' => 'rustic-elegance',
                'name' => 'Rustic Elegance',
                'hint' => 'Country charm',
                'image' => 'https://images.unsplash.com/photo-1469371670807-013ccf25f16a?auto=format&fit=crop&w=400&q=80',
            ],
            [
                'id' => 'vintage-lace',
                'name' => 'Vintage Lace',
                'hint' => 'Soft & nostalgic',
                'image' => 'https://images.unsplash.com/photo-1465495976277-4387d4b0b4c6?auto=format&fit=crop&w=400&q=80',
            ],
            [
                'id' => 'beach-breeze',
                'name' => 'Beach Breeze',
                'hint' => 'Ocean inspired',
                'image' => 'https://images.unsplash.com/photo-1515934751635-c81c6bc9a2d8?auto=format&fit=crop&w=400&q=80',
            ],
            [
                'id' => 'bohemian-dream',
                'name' => 'Bohemian Dream',
                'hint' => 'Free-spirited love',
                'image' => 'https://images.unsplash.com/photo-1507504031003-b417219a0fde?auto=format&fit=crop&w=400&q=80',
            ],
            [
                'id' => 'midnight-glam',
                'name' => 'Midnight Glam',
                'hint' => 'Bold and dark',
                'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?auto=format&fit=crop&w=400&q=80',
            ],
        ];

        return view('templates', compact('templates'));
    }
}
