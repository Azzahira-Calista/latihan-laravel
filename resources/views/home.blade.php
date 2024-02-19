@extends('layouts.main')

@section('container')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

    <h1>This is home page</h1>
@endsection