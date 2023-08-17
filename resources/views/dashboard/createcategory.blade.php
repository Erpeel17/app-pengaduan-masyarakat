@extends('dashboard.dashboard')

@section('container')
    <h2>{{ $title }}</h2>
    <div class="col-md-8">
        <form action="/dashboard/categories/store" method="post">
            @csrf
            <div>
                <label for="name" class="mb-1 fs-5">Nama Kategori</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div>
                <label for="description" class="mb-1 fs-5">deskripsi</label>
                <textarea class="form-control" rows="8" name="description" placeholder="Tulis pengaduan di sini" id="description"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-3">Kirim <i class="bi bi-send"></i></button>
            </div>
        </form>
    </div>
@endsection
