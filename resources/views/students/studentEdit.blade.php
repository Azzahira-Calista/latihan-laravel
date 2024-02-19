@extends('layouts.main')

@section('container')
    <h1>Edit Student</h1>
    <form action="/students/{{ $student->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nis">Nis:</label>
            <input type="text" name="nis" id="nis" class="form-control" value="{{ old('nis', $student->nis) }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $student->nama) }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
        </div>
        {{-- <div class="form-group">
            <label for="kelas_id">Class:</label>
            <input type="text" name="kelas_id" id="kelas_id" class="form-control" value="{{ old('kelas_id', $student->kelas_id) }}" required>
        </div> --}}
        <div class="form-group">
            <label for="kelas_id">Class:</label>
            <select class="form-select" name="kelas_id" id="kelas_id">
                @foreach($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}" {{ $student->kelas_id == $kelasItem->id ? 'selected' : '' }}>
                        {{ $kelasItem->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $student->alamat) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update student data</button>
    </form>
    <a href="/students/all">back</a>

@endsection
