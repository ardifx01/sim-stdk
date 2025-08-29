<div>
    <x-header page="Data Absensi Anggota STT" title="Data Absensi Anggota STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>


        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>
</div>
