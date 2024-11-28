<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{

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

    public function getOfferings()
    {
        $offerings = DB::table('offerings')
            ->select('title', 'description', 'image_url', 'button_link') // Use 'button_link' instead of 'url'
            ->get();

        return response()->json($offerings);
    }

    // Section 4: Blogs
    public function getBlogs()
    {
        $blogs = DB::table('blogs')
            ->select('title', 'image', 'content', 'descriptions', 'author', 'post_date', 'slug')
            ->inRandomOrder()
            ->limit(3)
            ->get()
            ->map(function ($blog) {
                // Format the date
                $blog->post_date = Carbon::parse($blog->post_date)->format('d-M-Y');

                // Generate the full URL for the image
                $blog->image_url = asset('images/blog/' . $blog->image);

                return $blog;
            });

        return response()->json($blogs); // Return JSON response
    }


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

    public function getCountryCodes()
    {
        $filePath = storage_path('app/country_codes.json');

        if (!file_exists($filePath)) {
            return response()->json(['error' => 'Country codes file not found.'], 404);
        }

        $countryCodes = file_get_contents($filePath);

        return response()->json(json_decode($countryCodes, true));
    }
}
