@extends('dashboard.dashboard')

@section('container')
    <h2>{{ $title }}</h2>
    <table class="table table-striped rounded overflow-hidden">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Content</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $complaint->user->name }}</td>
                @if (strlen($complaint->content) >= 30)
                <td>{{ substr($complaint->content, 0, 30) }}...</td>
                @else
                <td>{{ $complaint->content }}</td>
                @endif
                <td>{{ $complaint->category->name }}</td>
                <td>
                  <a href="/dashboard/response/{{ $complaint->id }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-chat-left-dots-fill"> Tanggapi</i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection