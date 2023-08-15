@extends('dashboard.dashboard')

@section('container')
<h2>{{ $title }}</h2>
<table class="table table-striped rounded overflow-hidden">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">NIK</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->nik }}</td>
            <td>{{ $user->role }}</td>
            <td>
              <a href="/dashboard/user/{{ $user->id }}" class="btn btn-sm btn-outline-primary">Detail</i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection