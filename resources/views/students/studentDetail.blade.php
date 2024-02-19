@extends('layouts.main')

@section('container')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">nis</th>
                <th scope="col">nama</th>
                <th scope="col">tanggal lahir</th>
                <th scope="col">kelas</th>
                <th scope="col">alamat</th>
                <th scope="col">Created at</th>
                <th scope="col">updated at</th>
    
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td>{{ $students['nis'] }}</td>
                <td>{{ $students['nama'] }}</td>
                <td>{{ $students['tanggal_lahir'] }}</td>
                <td>{{ $students->kelas->nama_kelas }}</td>
                <td>{{ $students['alamat'] }}</td>
                <td> {{ $students['created_at'] }}</td>
                <td> {{ $students['updated_at'] }}</td>

    
            </tr>
        </tbody>
    </table>

    <a href="/students/all">back</a>
@endsection