<div>
    <x-header page="Dashboard STT" title="Dashboard STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>


        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>
</div>
