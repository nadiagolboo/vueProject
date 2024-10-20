<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function getListGrades($studentId)
    {

        $grades=Grade::with('course')->where('student_id', $studentId)->get();
        if ($grades){
            return response()->json($grades);
        }
        else{
            return response()->json('Student not found');

        }


    }
}
