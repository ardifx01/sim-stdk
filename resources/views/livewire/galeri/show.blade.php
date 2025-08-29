<div>

    <x-header page="Detail Data Galeri STT" title="Detail Data Galeri STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>

        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="container">
        <div class="row">

            @if ($galeri->foto)
                <div class="mb-sm-3 col-md-4">
                    <div class="p-2 border rounded-3 shadow-table" style="background-color: #fffffe">
                        <div class="profil-foto ">
                            <img src="{{ $galeri->foto }}" class=" img-fluid rounded-3"
                                alt="foto profil {{ $galeri->judul }}" class="mx-auto rounded-3 d-block img-fluid">
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-8">
                <div class="border rounded-3 shadow-table" style="background-color: #fffffe">
                    <div class="p-2 row">
                        <div class=" col-md-6">
                            <div>
                                <p style="color: #67757c" class="m-0">Judul</p>
                                <p>{{ $galeri->judul }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Ditambahkan Oleh</p>
                                <p>{{ $galeri->user->nama }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Display</p>
                                <p>{{ $galeri->status->label() }}</p>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div>
                                <p style="color: #67757c" class="m-0">Tanggal</p>
                                <p>{{ $galeri->tanggal }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Keterangan</p>
                                <p>{{ $galeri->keterangan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
