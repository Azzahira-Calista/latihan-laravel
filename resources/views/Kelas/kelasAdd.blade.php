@extends('layouts.main')

@section('container')
    <h1>Add Student</h1>
    <form action="/kelas/store" method="post">
        @csrf
        <div class="form-group">
            <label for="nama">Kelas:</label>
            <input type="text" name="nama_kelas" id="nama" value="{{ old('nama_kelas') }}" class="form-control"> 
        </div>
        
        <button type="submit" class="btn btn-primary">Add Kelas</button>
    </form>
    <a href="/kelas/all">back</a>
@endsection