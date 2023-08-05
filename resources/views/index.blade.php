@extends('template.main')

@include('template.navbar')
@section('container')

<div class="row">
    <div class="col-8 m-auto">
        <div class="row">
            <div class="col-7">
                @if ($complaints->count() < 1)
                <h3 class="my-3">Anda belum memiliki pengaduan</h3>
                @else
                <h3 class="my-3">laporan anda</h3>
                @endif
            </div>
            <div class="col-5 d-flex align-items-center justify-content-end">
                <a href="/create" class="btn btn-success">Buat Pengaduan</a>
            </div>
        </div>
        
        <ol class="list-group list-group-numbered">
            @foreach ($complaints as $complaint)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">{{ $complaint->category->name }}</div>
                    {{-- <p>{{ substr($complaint->content, 0, 30) }}</p> --}}
                    <p class="mt-1">{{ $complaint->content }}</p>
                </div>
                <span class="badge bg-primary rounded-pill">{{ $complaint->status }}</span>
            </li>
            @endforeach
        </ol>
        @endsection
    </div>
</div>