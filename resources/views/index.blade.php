@extends('template.main')

@include('template.navbar')
@section('container')

<div class="row">
    <div class="col-md-8 m-auto">
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
        
        <ol class="list-group">
        @foreach ($complaints as $complaint)
            <li class="list-group-item d-flex justify-content-between align-items-start mt-3">
                <div class="ms-2 me-auto">
                    <div class="fw-bold text-primary">{{ $complaint->category->name }}</div>
                    {{-- <p>{{ substr($complaint->content, 0, 30) }}</p> --}}
                    <p class="mt-1">{{ $complaint->content }}</p>
                </div>
                    <span @class(['badge rounded-pill',
                                            'd-hidden' => $complaint->status == '0',
                                            'bg-primary' => $complaint->status == 'process',
                                            'bg-success' => $complaint->status == 'done',
                                            'bg-danger' => $complaint->status == 'rejected',
                                            ])>{{ $complaint->status }}</span>
                
            </li>

            <ul class="list-group rounded-0 rounded-bottom">
            @foreach ($complaint->responses as $response)
                <li class="list-group-item d-flex justify-content-between align-items-start ps-5 bg-body-secondary border pb-0">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $response->user->name }} ({{ $response->user->role }}) - <small class="fw-normal">{{ $response->time_ago }}</small></div>
                        <p class="mt-1">{{ $response->content }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
            @endforeach
        </ol>
    </div>
</div>
@endsection