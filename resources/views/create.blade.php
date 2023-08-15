@extends('template.main')

@include('template.navbar')
@section('container')


<div class="row">
    <div class="col-md-8 m-auto">
        <h2 class="my-3">Buat Pengaduan</h2>
        <form action="/store" method="post">
            @csrf
            <div>
                <label for="category" class="mb-1 fs-5">kategori</label>
                <select class="form-select form-select-lg mb-3" name="category_id" id="category" aria-label="Large select example">
                    <option value="{{ $categories[0]->id }}" selected>{{ $categories[0]->name }}</option>
                    @foreach ($categories->skip(1) as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="content" class="mb-1 fs-5">Pengaduan</label>
                <textarea class="form-control" rows="8" name="content" placeholder="Tulis pengaduan di sini" id="content"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-3">Kirim <i class="bi bi-send"></i></button>
            </div>
        </form>
    </div>
</div>
@endsection