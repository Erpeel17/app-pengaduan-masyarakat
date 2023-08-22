<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body class="bg-body-secondary">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Dashboard</a>
            <div class="justify-content-end dropdown text-white">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <h5>Pengaduan</h5>
                <div class="list-group">
                    <a href="/dashboard" @class([
                        'list-group-item list-group-item-action d-flex justify-content-between',
                        'active' => $active == 'pengaduan',
                    ])>Pengaduan <i class="bi bi-flag-fill"></i></a>
                    <a href="/dashboard/process" @class([
                        'list-group-item list-group-item-action d-flex justify-content-between',
                        'active' => $active == 'proses',
                    ])>Pengaduan Dalam Proses <i
                            class="bi bi-arrow-clockwise"></i></a>
                    <a href="/dashboard/done" @class([
                        'list-group-item list-group-item-action d-flex justify-content-between',
                        'active' => $active == 'selesai',
                    ])>Pengaduan Selesai <i
                            class="bi bi-check2-square"></i></a>
                    <a href="/dashboard/categories" @class([
                        'list-group-item list-group-item-action d-flex justify-content-between',
                        'active' => $active == 'category',
                    ])>Kategori <i
                            class="bi bi-bookmark-fill"></i></a>
                </div>
                <h5 class="mt-2">User</h5>
                <div class="list-group">
                    <a href="/dashboard/users" @class([
                        'list-group-item list-group-item-action d-flex justify-content-between',
                        'active' => $active == 'allUsers',
                    ])>Semua pengguna <i
                            class="bi bi-people-fill"></i></a>
                    <a href="/dashboard/officers" @class([
                        'list-group-item list-group-item-action d-flex justify-content-between',
                        'active' => $active == 'officers',
                    ])>Admin/petuagas <i
                            class="bi bi-person-badge-fill"></i></a>
                    <a href="/dashboard/officers/create" @class([
                        'list-group-item list-group-item-action d-flex justify-content-between',
                        'active' => $active == 'createOfficer',
                        'disabled' => auth()->user()->role != 'admin'
                    ])>Buat admin/petugas <i
                            class="bi bi-person-fill-add"></i></a>
                </div>
            </div>
            <div class="col-lg-9">
                @yield('container')
            </div>
        </div>
    </div>

    <!-- Load Bootstrap JS (Bootstrap Bundle - includes Popper.js) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

</body>

</html>
