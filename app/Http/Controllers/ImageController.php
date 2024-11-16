<?php

namespace App\Http\Controllers;

use App\Services\AzureStorageService;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    protected $azureStorageService;

    // Inject AzureStorageService
    public function __construct(AzureStorageService $azureStorageService)
    {
        $this->azureStorageService = $azureStorageService;
    }

    // Function to handle image upload
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate image
        ]);

        $image = $request->file('image'); // Get the image file from the request

        // Upload image to Azure Blob Storage
        $path = $this->azureStorageService->uploadImage($image);

        if ($path) {
            // Successfully uploaded
            return response()->json([
                'message' => 'Image uploaded successfully',
                'path' => $path, // Return the path to the image
            ]);
        }

        return response()->json(['message' => 'Failed to upload image'], 500);
    }
}
