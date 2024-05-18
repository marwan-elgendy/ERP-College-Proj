<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\OrganizationsImport;

class OrganizationsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        # Save file and get path
        $path = $file->store('organizations');
        # Import data from file
        Excel::import(new OrganizationsImport, $path);
        return response()->json(['message' => 'Organizations imported successfully'], 200);
    }

    /**
     * Return all organizations
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(){
        $organizations = Organization::all();
        # decode the utf8 encoded names
        // foreach ($organizations as $organization) {
        //     $organization->name = utf8_decode($organization->name);
        // }
        return response()->json($organizations, 200);
    }
}
