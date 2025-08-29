<div>
    {{-- The whole world belongs to you. --}}
    <x-header page="Dashboard Berita STT" title="Dashboard Berita STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>
        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="container">
        <div class="row">
            <div class="p-3">
                <div class="pb-5 d-flex justify-content-center">
                    <div>
                        <div class="card shadow-table" style="width: 40rem;">
                            @if ($berita->foto)
                                <img src="{{ $berita->foto }}" class="card-img-top" alt="{{ $berita->judul }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $berita->judul }}</h5>
                                <h6 class="mb-2 card-subtitle text-muted">Dibuat Oleh : {{ $berita->user->nama }}</h6>
                                <h6 class="mb-2 card-subtitle text-muted">Terbit : {{ $berita->tanggal }}</h6>
                                <p class="card-text">{!! $berita->keterangan !!}</p>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">
                            <x-button class="mt-2 mb-2 text-white btn btn-delete">
                                <a href="{{ route('kegiatan.index') }}">Back</a>
                            </x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
