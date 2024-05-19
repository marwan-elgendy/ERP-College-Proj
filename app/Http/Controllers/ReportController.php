<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Proffesor;

class ReportController extends Controller
{
    public function generate($subject_id){
        $subject_id = (int)$subject_id;
        $subject = Subject::where('subject_id', $subject_id)->first();
        $professors = Proffesor::where('subject_id', $subject_id)->get();
        $net_balance = 0;
        foreach ($professors as $professor){
            $net_balance += ($subject->hours_per_subject * $subject->price_per_hour * $professor->subject_cut) - $subject->university_cut;
        }
        return response()->json(['net_balance' => $net_balance], 200);
    }
}
