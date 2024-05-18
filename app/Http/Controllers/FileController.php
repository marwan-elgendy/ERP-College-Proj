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
        $csv= file_get_contents($file);
        $array = array_map('str_getcsv', explode(PHP_EOL, $csv));
        $metadata = json_encode($array);
        $fileRecord = new File();
        $fileRecord->metadata = $metadata;
        $fileRecord->save();
        return response()->json(['message' => 'File uploaded successfully'], 200);
    }
}
