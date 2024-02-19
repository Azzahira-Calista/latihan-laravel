@extends('layouts.main')

@section('container')
    <h1>Add Student</h1>
    <form action="/students/store" method="post">
        @csrf
        
        <div class="form-group">
            <label for="nis">Nis:</label>
            <input type="number" name="nis" id="nis" class="form-control" value="{{ old('nis') }}" required>
        </div>
        <div class="form-group">
            <label for="nama">Name:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir') }}" required>
        </div>
        {{-- <div class="form-group">
            <label for="kelas">Class:</label>
            <select name="kelas" id="kelas" class="form-select">
                @foreach ($kelas as $item)
                <option name='kelas' value="{{ $item->id }}">{{ $iten->nama }}</option>
                    
                @endforeach
            </select>

            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas') }}" required>
        </div> --}}

        <div class="form-group">
            <label for="jenis">Kelas:</label>
            {{-- <input type="text" name="kelas" id="kelas" value="{{ $student->kelas}}" class="form-control">  --}}
            <select class="form-select" name="kelas_id" id="kelas_id">
                @foreach($kelas as $kelasItem)
                    <option name="kelas_id" value={{$kelasItem->id}}>{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
@endsection