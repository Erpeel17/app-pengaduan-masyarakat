@extends('dashboard.dashboard')

@section('container')
<h2>{{ $title }}</h2>
<table class="table table-striped rounded overflow-hidden">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">NIK</th>
        @if ($active == 'officers')
          <th scope="col">Role</th>
        @else
          <th scope="col">Actions</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->nik }}</td>
            @if ($active == 'officers')
            <td>{{ $user->role }}</td>
            @else
            <td>
              <a href="/dashboard/user/{{ $user->id }}" class="btn btn-sm btn-outline-primary">Detail</i></a>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection