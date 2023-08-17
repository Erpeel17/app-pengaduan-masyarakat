@extends('dashboard.dashboard')

@section('container')
    <h2>{{ $title }}</h2>
    <div class="col-md-8">
        <a href="/dashboard/categories/create" class="btn btn-primary my-2">Tambah Kategori <i
                class="bi bi-bookmark-plus"></i></a>
        <table class="table table-striped rounded overflow-hidden">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $category->name }}</td>
                        <td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
