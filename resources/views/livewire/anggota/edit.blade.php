<div>
    <x-header page="Data Anggota STT" title="Data Anggota STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>

        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            <div class="col-md-9">
                <div class="p-5 border rounded-3 shadow-table" style="background-color: #fffffe">
                    <div class="mb-3">
                        <h2>Update Data Anggota</h2>
                    </div>
                    <form action="" wire:submit="updateanggota" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-3 col-md-6 col-sm-12">
                                    <label for="nama" class="form-label">Nama
                                        Lengkap</label>
                                    <input type="text" class="form-control" id="nama" wire:model='nama'>
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" wire:model='email'>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="umur" class="form-label">Umur</label>
                                    <input type="text" class="form-control" id="umur" wire:model='umur'>
                                    @error('umur')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" wire:model='pekerjaan'>
                                    @error('pekerjaan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" wire:model='alamat'>
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="no_telepon" class="form-label">No. Telepon</label>
                                    <input type="text" class="form-control" id="no_telepon" wire:model='no_telepon'>
                                    @error('no_telepon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="jabatan">Jabatan</label>
                                    <select class="form-select" id="jabatan" wire:model='jabatan'>
                                        @foreach (App\Enums\JabatanEnum::cases() as $jabatan)
                                            <option value="{{ $jabatan->value }}">{{ $jabatan->value }}</option>
                                        @endforeach
                                    </select>
                                    @error('jabatan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="status">Status</label>
                                    <select class="form-select" id="status" wire:model='status'>
                                        @foreach (App\Enums\StatusAnggotaEnum::cases() as $status)
                                            <option value="{{ $status->value }}">{{ $status->value }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" wire:model='jenis_kelamin'>
                                        @foreach (App\Enums\JenisKelamin::cases() as $jeniskelamin)
                                            <option value="{{ $jeniskelamin->value }}">{{ $jeniskelamin->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jenis_kelamin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="foto" class="form-label">Foto Profil</label>
                                    <input class="form-control" type="file" id="foto" wire:model='foto'>
                                    @error('foto')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mt-1 justify-content-between d-flex">
                                    <x-button type="button" class="button btn-delete"><a
                                            href="{{ route('anggota.index') }}">Back</a></x-button>
                                    <x-button type="submit" class="button btn-update">Submit</x-button>
                                </div>

                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>


</div>
