<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ContentController extends Controller
{
    // For rendering the view
    public function index()
    {
        // Fetch data from the 'section_one' table
        $sectionData = DB::table('section_one')->first(); // Fetch the first record

        // If no data is found, use default values
        if (!$sectionData) {
            $sectionData = (object)[
                'title' => 'Default Title',
                'description' => 'Default Description',
                'image_url' => '/path/to/default/image.jpg'
            ];
        }

        // Debugging: Check the fetched data
        // dd($sectionData);  // This will output the $sectionData and stop execution

        // Pass the data to the view
        return view('index', ['sectionData' => $sectionData]);
    }


    // For returning data as API
    public function getSectionOneData()
    {
        $sectionData = DB::table('section_one')->first();

        if (!$sectionData) {
            $sectionData = (object)[
                'title' => 'Default Title',
                'description' => 'Default Description',
                'image_url' => '/path/to/default/image.jpg'
            ];
        }

        return response()->json($sectionData);
    }




    // Section 2: Offerings - List of Offerings
    public function getOfferings()
    {
        $offerings = DB::table('offerings')
            ->select('title', 'description', 'image_url', 'button_link') // Use 'button_link' instead of 'url'
            ->get();

        return response()->json($offerings);
    }



    // Section 3: Stats - AUM, Clients, Team Members
    public function getStats()
    {
        $stats = DB::table('stats')->pluck('value', 'key_name');

        return view('sections.stats', compact('stats'));
    }

    // Section 3 (Additional): CSR and Team Activity Images
    public function getActivities()
    {
        $csrImages = DB::table('csr_images')->pluck('image_url');
        $teamImages = DB::table('team_activity_images')->pluck('image_url');

        return view('sections.activities', compact('csrImages', 'teamImages'));
    }

    // Section 4: Blogs
    public function getBlogs()
    {
        $blogs = DB::table('blogs')
            ->select('title', 'image', 'description', 'author', 'date', 'slug')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->map(function ($blog) {
                $blog->date = Carbon::parse($blog->date)->format('d-M-Y'); // Format the date
                return $blog;
            });
    
        // Log the blogs
        Log::info('Fetched blogs:', $blogs->toArray());
        return response()->json($blogs); // Return JSON response
    }
    

    // Section 4: Magazines
    public function getMagazines()
    {
        try {
            $magazines = DB::table('magazines')
                ->select('issue_name', 'image_url', 'pdf_url', 'slug', 'release_date')
                ->orderBy('release_date', 'desc')
                ->limit(2)
                ->get()
                ->map(function ($magazine) {
                    $magazine->release_date = Carbon::parse($magazine->release_date)->format('d-M-Y'); // Format the date
                    return $magazine;
                });

            return response()->json($magazines);
        } catch (\Exception $e) {
            // Log the error internally
            Log::error("Failed to fetch magazines: {$e->getMessage()}");

            // Return a generic error message
            return response()->json(['error' => 'Failed to fetch magazines'], 500);
        }
    }

    
    



}
