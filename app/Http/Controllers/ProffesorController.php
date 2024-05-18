<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProffesorImport;
use App\Models\Proffesor;

class ProffesorController extends Controller
{

    public function store(Request $request)
    {
        $file = $request->file('file');
        # Save file and get path
        $path = $file->store('proffesors');
        # Import data from file
        Excel::import(new ProffesorImport, $path);
        return response()->json(['message' => 'Proffesors imported successfully'], 200);
    }

    /**
     * Return all proffesors
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $proffesors = Proffesor::all();
        return response()->json($proffesors, 200);
    }
}
