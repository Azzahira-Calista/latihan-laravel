<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function student()
    {
        // return view('dashboard.student', [
        //     'student' => Student::latest()->filter(request(['search']))->paginate(10),
        //     'students' => Student::all()
        // ]);
        $students = Student::with('kelas')->filter(request(['search']))->paginate(7);
        return view('dashboard.student', [
            "title" => "student_page",
            "students" => $students
        ]);
    }

    public function kelas()
    {
        return view('dashboard.kelas', [
            'kelass' => Kelas::all()
        ]);
    }
}
