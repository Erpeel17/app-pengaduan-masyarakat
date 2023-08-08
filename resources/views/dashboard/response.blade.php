@extends('dashboard.dashboard')

@section('container')
<h5>Pengaduan</h5>
<div class="border rounded p-2 bg-white">
    <p>{{ $complaint->content }}</p>
</div>

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