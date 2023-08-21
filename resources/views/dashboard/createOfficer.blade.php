@extends('dashboard.dashboard')

@section('container')
<h2>{{ $title }}</h2>

<div class="row mb-3">
    <div class="col-md-8 bg-white p-3 rounded">
        <form action="/store" method="post">
            @csrf
            <div class="mb-1">
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nama">
            </div>
            <div class="mb-1">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username">
            </div>
            <div class="mb-1">
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <label for="nik" class="form-label">NIK</label>
                <input type="number" name="nik" class="form-control" id="nik" placeholder="NIK">
            </div>
            <div class="mb-1">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-check form-check-inline mt-2">
                <input class="form-check-input" type="radio" name="role" id="admin" value="admin">
                <label class="form-check-label" for="admin">Admin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="role" id="petugas" value="petugas" checked>
                <label class="form-check-label" for="petugas">Petugas</label>
            </div>
            <div>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection