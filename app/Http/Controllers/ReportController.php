<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Proffesor;

class ReportController extends Controller
{
    public function generate($proffesor_id){
        $proffesor_id = (int)$proffesor_id;
        $proffesor_records = Proffesor::where('proffesor_id', $proffesor_id)->get();
        // Get subjects for the proffesor
        $subjects = [];
        foreach ($proffesor_records as $proffesor){
            $subjects[] = Subject::where('subject_id', (int)$proffesor->subject_id)->first();
            // add the proffesor's cut to the subject
            $subjects[count($subjects) - 1]->proffesor_cut = $proffesor->subject_cut;
        }
        $net_balance = 0;
        foreach ($subjects as $subject){
            $net_balance += ($subject->hours_per_subject * $subject->price_per_hour * $subject->proffesor_cut) - $subject->university_cut;
        }
        return response()->json(['net_balance' => $net_balance], 200);
    }
}
