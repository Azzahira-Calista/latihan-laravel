<?php

namespace App\Http\Controllers;

use App\Models\Kelas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KelasController extends Controller
{

    public function index()
    {
        return view('kelas.kelas', [
            "title" => "kelas",
            "kelas" => Kelas::all()
        ]);
    }

    public function edit(Kelas $kelas)
    {
        return view('kelas.kelasEdit', [
            "title" => "edit-kelas",
            "kelas" => $kelas
        ]);
    }

    public function update(Request $request, $kelas)
    {
        $validateData = $request->validate([
            "nama" => "required",
        ]);

        $result = Kelas::where('id', $kelas->id)->update($validateData);

        if ($result) {
            return redirect('/dashboard/kelas')->with('success', 'Data kelas berhasil diperbarui.');
        }
    }

    public function destroy(Kelas $kelas)
    {
        // $result = Kelas::destroy($kelas->nama_kelas);

        // if ($result) {
        //     return redirect('/kelas/all')->with('success', 'Data kelas berhasil dihapus.');
        // }
        $kelas->delete();

        return redirect('/dashboard/kelas')->with('success', 'Class deleted successfully');
    }

    public function create()
    {
        return view('kelas.kelasAdd', [
            'title' => 'Add Kelas',
            'kelas' => Kelas::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kelas' => 'required',
        ]);

        $result = Kelas::create($validatedData);

        if ($result) {
            // return redirect('/students/all')->with('success', 'Student added successfully !');
            Session::flash('success', 'Data kelas Berhasil Ditambahkan!');

            return redirect('/dashboard/kelas');
        }
    }
}
