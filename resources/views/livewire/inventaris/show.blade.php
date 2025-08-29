<div>
    <x-header page="Detail Data Inventaris STT" title="Detail Data Inventaris STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>

        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="container">
        <div class="row">
            @if ($item->foto)
                <div class="mb-sm-3 col-md-4">
                    <div class="p-2 border rounded-3 shadow-table" style="background-color: #fffffe">
                        <div class="profil-foto">
                            <img src="{{ $item->foto }}" class="img-fluid rounded-3"
                                alt="foto profil {{ $item->barang }}" class="mx-auto rounded-3 d-block img-fluid">
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-8">
                <div class="p-2 border rounded-3 shadow-table" style="background-color: #fffffe">
                    <div class="p-2 row">
                        <div class=" col-md-6">
                            <div>
                                <p style="color: #67757c" class="m-0">Nama Barang</p>
                                <p>{{ $item->barang }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Ditambahkan Oleh</p>
                                <p>{{ $item->user->nama }}</p>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div>
                                <p style="color: #67757c" class="m-0">Harga</p>
                                <p>{{ $item->harga }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Jumlah</p>
                                <p>{{ $item->jumlah }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Kondisi</p>
                                <p>{{ $item->kondisi->label() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-button class="mt-2 button btn-delete">
                <a href="{{ route('inventaris.index') }}">Back</a>
            </x-button>
        </div>
    </div>
</div>
