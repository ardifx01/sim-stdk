<nav class="bg-transparent navbar navbar-expand-lg navbar-dark">
    <div class="container">
        {{-- Logo --}}
        <a class="navbar-brand fs-4" href="#">ST Dharma Kahuripan</a>
        {{-- Toogle --}}
        <button class="border-0 shadow-none navbar-toggler" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

            {{-- sidebar --}}
        </button>
        <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            {{-- sidebar header --}}
            <div class="text-white offcanvas-header border-bottom">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">STDK</h5>
                <button type="button" class="shadow-none btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            {{-- sidebar body --}}
            <div class="p-4 p-lg-0 offcanvas-body flex-lg-row d-flex flex-column">
                <ul class="navbar-nav justify-content-center fs-5 flex-grow-1 pe-3">
                    <li class="mx-2 nav-item">
                        <a class="nav-link {{ request()->routeIs('users.beranda') ? 'active' : '' }}"
                            aria-current="page" wire:navigate href="{{ route('users.beranda') }}">Home</a>
                    </li>
                    <li class="mx-2 nav-item">
                        <a class="nav-link {{ request()->routeIs('users.kegiatan') ? 'active' : '' }}"
                            aria-current="page" wire:navigate href="{{ route('users.kegiatan') }}">Kegiatan</a>
                    </li>
                    <li class="mx-2 nav-item">
                        <a class="nav-link" href="#">Keuangan</a>
                    </li>
                    <li class="mx-2 nav-item">
                        <a class="nav-link" href="#">Galeri</a>
                    </li>
                    <li class="mx-2 nav-item">
                        <a class="nav-link" href="#">Berita</a>
                    </li>
                    <li class="mx-2 nav-item">
                        <a class="nav-link" href="#">Profil</a>
                    </li>

                </ul>
                {{-- Login / Sign Up --}}
                <div class="gap-3 d-flex flex-column flex-lg-row justify-content-center align-items-center">
                    <a href="login" class="px-3 py-1 text-white text-decoration-none rounded-4 "
                        style="background-color: #38d8de ">Pengurus</a>
                    <a href="login" class="px-3 py-1 text-white text-decoration-none rounded-4">Login</a>
                    <a href="register" class="px-3 py-1 text-white text-decoration-none rounded-4"
                        style="background-color: #f94ca4 ">Sign
                        UP</a>
                </div>
            </div>
        </div>
    </div>
</nav>
