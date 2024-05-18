<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SubjectsImport;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        # Save file and get path
        $path = $file->store('subjects');
        # Import data from file
        Excel::import(new SubjectsImport, $path);
        return response()->json(['message' => 'Subjects imported successfully'], 200);
    }

    /**
     * Return all subjects
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $subjects = Subject::all();
        return response()->json($subjects, 200);
    }
}
