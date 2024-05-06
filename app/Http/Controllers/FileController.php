<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\File;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');

        # Send data to the pre-processing service and get the pre-processed data
        $url = config('app.process_service_url') . '/preprocessing';
        $response = Http::post($url, [
            'file' => $file
        ]);

        # Create a new file record in the database

        $file = new File();
        $file->title = $request->title;
        $file->preprocessed_data = $response->body();
    }
}
