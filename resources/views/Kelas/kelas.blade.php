@extends('layouts.main')

@section('container')
<h1>Ini adalah halaman kelas</h1>
{{-- <a href="/kelas/create" class="btn btn-outline-warning ">Add Kelas</a> --}}
<table class="table">
  <thead>
    <tr>
      <td>No</td>
      <td>Nama</td>
      {{-- <td>Action</td> --}}
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($kelas as $key => $kelas)
    <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $kelas->nama_kelas }}</td>
      {{-- <td>
        <a type="button" class="btn btn-outline-warning" href="/kelas/edit/{{$kelas->id}}" >Edit</a>
        <form action="/kelas/delete/{{$kelas->id}}" method="post" class="d-inline">
            @csrf 
            @method('DELETE')
          <button class="btn btn-outline-danger"  onclick="return confirm('Are you sure you want to delete this class?')">Delete</button>
        </form>
      </td> --}}
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
