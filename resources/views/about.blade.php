@extends('layouts.main')

@section('container')
<div class="d-flex flex-column justify-content-center align-items-center">
    <h1>This is about page</h1>
    <h1>{{ $nama }}</h1>
    {{-- {{ $kelas }} --}}
    <img src="{{ $foto }}" alt="foto" class="w-8">
</div>




@endsection