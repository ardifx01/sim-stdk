<div>
    <x-header page="Data Inventaris STT" title="Data Inventaris STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>

        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>
    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            <div class="col-md-9">
                <div class="p-5 border rounded-3 shadow-table" style="background-color: #fffffe">
                    <div class="mb-3">
                        <h2>Edit Inventaris</h2>
                    </div>
                    <form wire:submit="updateinventory" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-3 col-md-6 col-sm-12">
                                    <label for="nama" class="form-label">Nama
                                        Barang</label>
                                    <input type="text" class="form-control" id="barang" wire:model='barang'>
                                    <div style="color: red; font-size: 12px">
                                        @error('barang')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="text" class="form-control" id="harga" wire:model='harga'>
                                    <div style="color: red; font-size: 12px">
                                        @error('harga')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="jumlah" wire:model='jumlah'>
                                    <div style="color: red; font-size: 12px">
                                        @error('jumlah')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="kondisi" class="form-label">kondisi</label>
                                    <select class="form-select" id="kondisi" wire:model='kondisi'>
                                        <option selected>Pilih kondisi</option>
                                        @foreach (App\Enums\KondisiEnum::cases() as $kondisi)
                                            <option value="{{ $kondisi->value }}">{{ $kondisi->value }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div style="color: red; font-size: 12px">
                                        @error('kondisi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="foto" class="form-label">Foto Barang</label>
                                    <input class="form-control" type="file" id="foto" wire:model='foto'>
                                    <div style="color: red; font-size: 12px">
                                        @error('foto')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-1 justify-content-between d-flex">
                                    <button type="button" class="button btn-delete"><a
                                            href="{{ route('inventaris.index') }}">Back</a></button>
                                    {{-- <x-button type="submit" class="button btn-update">Submit</x-button> --}}
                                    <button type="submit" class="button btn-update">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
