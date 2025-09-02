<nav style="color: rgba(0,0,0,0.3)" class="bg-dark navbar navbar-expand-lg navbar-dark">
    <div class="container">
        {{-- Logo --}}
        <a class="navbar-brand fs-4" wire:navigate href="{{ route('users.beranda') }}">ST Dharma
            Kahuripan</a>
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
                        <a class="nav-link {{ request()->routeIs('users.keuangan') ? 'active' : '' }}" wire:navigate
                            href="{{ route('users.keuangan') }}">Keuangan</a>
                    </li>
                    <li class="mx-2 nav-item">
                        <a class="nav-link {{ request()->routeIs('users.galeri') ? 'active' : '' }}" wire:navigate
                            href="{{ route('users.galeri') }}">Galeri</a>
                    </li>
                    <li class="mx-2 nav-item">
                        <a class="nav-link {{ request()->routeIs('users.berita') ? 'active' : '' }}" wire:navigate
                            href="{{ route('users.berita') }}">Berita</a>
                    </li>
                    @auth
                        <li class="mx-2 nav-item">
                            <a class="nav-link {{ request()->routeIs('profil.*') ? 'active' : '' }}" wire:navigate
                                href="{{ route('profil.index') }}">Profil</a>
                        </li>
                    @endauth
                </ul>
                {{-- Login / Sign Up --}}
                <div class="gap-3 d-flex flex-column flex-lg-row justify-content-center align-items-center">
                    @auth
                        @can('akses-admin')
                            <div style="background-color: #58e44b "class="px-3 py-1 text-white rounded-4">
                                <a class="text-white text-decoration-none" wire:navigate
                                    href="{{ route('dashboard.index') }}">Dashboard</a>
                            </div>
                        @endcan
                        <div style="background-color:#cd2b2b; " class="px-3 py-1 text-white text-decoration-none rounded-4">
                            @livewire('auth.logout')
                        </div>
                    @endauth
                    @guest
                        <a wire:navigate href="{{ route('login') }}"
                            class="px-3 py-1 text-white text-decoration-none rounded-4">Login</a>
                        <a wire:navigate href="{{ route('register') }}"
                            class="px-3 py-1 text-white text-decoration-none rounded-4"
                            style="background-color: #f94ca4 ">Sign
                            UP</a>
                    @endguest

                </div>
            </div>
        </div>
    </div>
</nav>
