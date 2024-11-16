<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Exception;

class AzureStorageService
{
    // Upload Image to Azure Blob Storage
    public function uploadImage($file)
    {
        try {
            // Store the file in the Azure Blob Storage container
            $path = $file->store('images', 'azure'); // 'images' is the folder name, 'azure' is the disk defined in filesystems.php
            
            return $path; // The stored file path
        } catch (Exception $e) {
            // Handle exceptions if something goes wrong
            return null;
        }
    }
}
