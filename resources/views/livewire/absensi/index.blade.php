<div>
    <x-header page="Data Absensi Anggota STT" title="Data Absensi Anggota STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>
        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>
    <form wire:submit="save">
        @foreach ($users as $user)
            <input type="checkbox" wire:model="selected_users.{{ $user->id }}" value="{{ $user->id }}" />
            <label>{{ $user->nama }}</label>
            <br />
        @endforeach
        <button type="submit" class="button btn-update">Submit</button>
    </form>
</div>
