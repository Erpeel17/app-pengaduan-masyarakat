@extends('dashboard.dashboard')

@section('container')
<h5>Pengaduan</h5>

<div class="list-group-item d-flex justify-content-between align-items-start mt-3 bg-white p-2 rounded-top border border-primary">
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

</div>
<ul class="list-group rounded-0 rounded-bottom">
    @foreach ($complaint->responses as $response)
        <li class="list-group-item d-flex justify-content-between align-items-start ps-3 bg-primary-subtle border-b border-primary pb-0">
            <div class="ms-2 me-auto">
                <div class="fw-bold">{{ $response->user->name }} ({{ $response->user->role }}) - <small class="fw-normal">{{ $response->time_ago }}</small></div>
                <p class="mt-1">{{ $response->content }}</p>
            </div>
        </li>
    @endforeach
</ul>   

<div>
    <form action="/dashboard/response" method="post">
        @csrf
        <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">
        <div>
            <label for="content" class="mb-1 fs-5 fw-semibold">Tanggapan</label>
            <textarea class="form-control" rows="8" name="content" placeholder="Tulis pengaduan di sini" id="content"></textarea>
        </div>
        <label for="status" class="mb-1 fs-5 fw-semibold">Ubah status</label>
        <div class="row">
            <div class="col">
                <select class="form-select form-select mb-3" name="status" id="status">
                    <option value="process" selected>Proses</option>
                    <option value="done">Selesai</option>
                    <option value="rejected">Tolak</option>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection