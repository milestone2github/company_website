<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Magazine;

class HomeController extends Controller
{
    public function home()
    {
        $sectionData = $this->getSectionData();

        $blogs = Blog::inRandomOrder()->take(3)->get();
        $magazines = Magazine::inRandomOrder()->take(3)->get();

        return view('home', compact('sectionData', 'blogs', 'magazines'));
    }

    private function getSectionData()
    {
        // Fetch your section data here, replace with actual data retrieval logic
        return (object) [
            'title' => 'Welcome to mNivesh',
            'description' => 'Your trusted partner in financial growth and investment strategies.',
            'image_url' => asset('images/default-section-image.jpg'),
        ];
    }
}
