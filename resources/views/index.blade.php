@extends('template.main')

@include('template.navbar')
@section('container')
    <h3 class="my-3">laporan anda</h3>
    <ol class="list-group list-group-numbered">
        @foreach ($complaints as $complaint)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">{{ $complaint->category->name }}</div>
                <p>{{ substr($complaint->content, 0, 30) }}</p>
            </div>
            <span class="badge bg-primary rounded-pill">{{ $complaint->status }}</span>
        </li>
        @endforeach
    </ol>
@endsection