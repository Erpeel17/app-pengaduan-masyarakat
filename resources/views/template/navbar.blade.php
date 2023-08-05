<nav class="navbar navbar-expand-lg bg-white shadow-sm position-sticky top-0 z-3">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/"><i class="bi bi-chat-square-text-fill text-primary"></i> Pengaduan Masyarakat</a>
        @if (auth()->user())
            <div class="justify-content-end dropdown">
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
        @endif
    </div>
</nav>