<div>
    {{-- Be like water. --}}
    <x-header page="Data Keuangan STT" title="Data Keuangan STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>
        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="p-2 border rounded-3 shadow-table" style="background-color: #fffffe">
                    <div class="p-2 row">
                        <div class=" col-md-6">
                            <div>
                                <p style="color: #67757c" class="m-0">Ditambahkan Oleh</p>
                                <p>{{ $cash->user->nama }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Kegiatan</p>
                                <p>{{ $cash->activity->judul }}</p>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div>
                                <p style="color: #67757c" class="m-0">Pemasukan</p>
                                <p>{{ $cash->pemasukan }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Pengeluaran</p>
                                <p>{{ $cash->pengeluaran }}</p>
                            </div>
                            <div>
                                <p style="color: #67757c" class="m-0">Tanggal</p>
                                <p>{{ $cash->tanggal }}</p>
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
