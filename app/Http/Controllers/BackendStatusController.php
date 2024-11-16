<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BackendStatusController extends Controller
{
    public function getBackendStatus()
    {
        // Call Node.js backend
        $nodeResponse = Http::get('http://localhost:5000/api/status');
        
        // Call Python backend
        $pythonResponse = Http::get('http://localhost:8001/status');

        return view('status', [
            'nodeStatus' => $nodeResponse->json(),
            'pythonStatus' => $pythonResponse->json(),
        ]);
    }
}
