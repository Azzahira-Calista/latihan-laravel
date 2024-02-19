@extends('dashboard.dashboard')

@section('content')
@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

<h1>This is student page</h1>
<a href="/students/create/" class="btn btn-outline-warning ">Add Student</a>

<table class="table">
    <thead>
        <tr>
            {{-- <th scope="col">No</th> --}}
            <th scope="col">nama</th>
            <th scope="col">kelas</th> 
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($students as $key=> $student)
        <tr>
            {{-- <td>{{ $key +1 }}</td> --}}
            <td>{{ $student->nama }}</td>
            {{-- <td>{{ $student->kelas->nama_kelas }}</td>               --}}
            <td>{{ optional($student->kelas)->nama_kelas }}</td>

            <td> 
            {{-- <a href="/students/detail/{{ $student->id }}"  type="button" class="btn btn-outline-primary">Detail</a> --}}
            <a href="/students/{{ $student->id }}/edit" class="btn btn-outline-warning" role="button">Edit</a>

            <form action="/students/delete/{{ $student->id }}" method="post" class="d-inline">
                @csrf 
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination justify-content-center">
    {{ $students->links() }}
</div>
@endsection