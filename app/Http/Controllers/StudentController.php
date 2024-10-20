<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudent($studentId)
    {
        $student =Student::where('student_number', $studentId)->firstOrFail();
        if ($student){
            return response()->json($student);
        }
        else{
            return response()->json('Student not found');
        }
    }
}

