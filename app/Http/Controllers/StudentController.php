<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::with('kelas')->paginate(7);
        return view('students.student', [
            "title" => "student_page",
            "students" => $students
        ]);
    }
    

    public function show($student)
    {
        return view('students.studentDetail', [
            "title" => "detail_student",
            "students" => Student::find($student)
        ]);
    }
    //// method create sama store buat add student

    public function create()
    {
        return view('students.studentAdd', [
            'title' => 'Add Student',
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        //cara pak fahmi
        //Student::create($validatedData);

        $result = Student::create($validatedData);
        if ($result) {
            // return redirect('/students/all')->with('success', 'Student added successfully !');
            Session::flash('success', 'Data Siswa Berhasil Ditambahkan!');

            return redirect('/dashboard/student');
        }

        // $student = new Student();
        // $student->nis = $validatedData['nis'];
        // $student->nama = $validatedData['nama'];
        // $student->tanggal_lahir = $validatedData['tanggal_lahir'];
        // $student->kelas = $validatedData['kelas'];
        // $student->alamat = $validatedData['alamat'];

        // $student->save();


        // return redirect('/students/all')->with('success', 'Student added successfully !');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('/dashboard/student')->with('success', 'Student deleted successfully');
    }

    public function edit(Student $student)
    {
        // return view(
        //     'students.studentEdit',
        //     [
        //         'title' => 'Edit Student',
        //         'kelas_id' => Kelas::all(),
        //         'student' => $student
        //     ],
        //     compact('student'),
        // );
        $kelas = Kelas::all();

        return view(
            'students.studentEdit',
            [
                'title' => 'Edit Student',
                'student' => $student,
                'kelas_id' => Kelas::all(),
                'kelas' => $kelas,
            ],
            compact('student'),
        );
    }

    // public function update(Request $request, Student $student)
    // {
    //     $validatedData = $request->validate([
    //         'nis' => 'required',
    //         'nama' => 'required',
    //         'tanggal_lahir' => 'required',
    //         'kelas_id' => 'required',
    //         'alamat' => 'required',
    //     ]);

    //     $student->update($validatedData);

    //     return redirect('/students/all')->with('success', 'Student updated successfully');
    // }

    public function update(Request $request, Student $student)
    {
        $validateData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'kelas_id' => 'required',
            'alamat' => 'required',
        ]);

        $result = Student::where('id', $student->id)->update($validateData);

        if ($result) {
            return redirect('/dashboard/student')->with('success', 'Data Berhasil Diubah');
        }
    }
}
