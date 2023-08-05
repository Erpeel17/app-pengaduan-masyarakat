@extends('dashboard.dashboard')

@section('container')
    <h2>Pengaduan selesai</h2>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Content</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($complaints as $complaint)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                @if (strlen($complaint->content) >= 30)
                <td>{{ substr($complaint->content, 0, 30) }}...</td>
                @else
                <td>{{ $complaint->content }}</td>
                @endif
                <td>{{ $complaint->category->name }}</td>
                <td>@mdo</td>
            </tr>
            @endforeach
        </tbody>
      </table>
@endsection