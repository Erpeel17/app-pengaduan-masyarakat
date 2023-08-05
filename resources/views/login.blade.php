@extends('template.main')

@section('container')
    <div class="row">
        <div class="col-md-4 m-auto">
            <div class="form-signin mt-5">

                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>  
                @endif

                <form action="/login" method="post">
                    @csrf
                    <h1 class="h3 mb-3 fw-normal">Please Login</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top"
                            name="username" placeholder="name@example.com" autofocus autocomplete="off" required>
                        <label for="floatingInput">username</label>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom" name="password" placeholder="Password" autocomplete="off" required>
                        <label for="floatingPassword">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
            </div>
            <small>Not registered? <a href="/register">register now</a></small>
        </div>
    </div>
@endsection