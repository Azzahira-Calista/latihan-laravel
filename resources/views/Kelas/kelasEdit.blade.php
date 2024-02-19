@extends('layouts.main')

@section('container')

    <div class="container mt-5">
        <form action="/kelas/{{ $kelas->id }}" method="POST">
            @csrf
            {{-- @method('PUT') --}}

            <div class="form-group">
                <label for="nama_kelas" >Kelas</label>
                <input type="text" class="form-control" id="nama_kelas" placeholder="Masukkan Kelas" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas) }}">
            </div>
            <button type="submit" class="btn btn-primary" >Update student data</button>
        </form>
    </div>

    <a href="/kelas/all">back</a>


@endsection