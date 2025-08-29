<div>
    <x-header page="Data Kegiatan STT" title="Data Kegiatan STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>
        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="p-3">
        <div class="pb-5 d-flex justify-content-center">
            <div>
                <div class="card shadow-table" style="width: 30rem;">
                    @if ($activity->foto)
                        <img src="{{ $activity->foto }}" class="card-img-top" alt="{{ $activity->judul }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $activity->judul }}</h5>
                        <p class="card-text">{!! $activity->keterangan !!}</p>
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
