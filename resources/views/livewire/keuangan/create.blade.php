<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <x-header page="Data Keuangan STT" title="Data Keuangan STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>
        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="col-md-12" style="height: 100vh">
        <div class="d-flex justify-content-center">
            <div class="col-md-9">
                <div class="p-5 border rounded-3 shadow-table" style="background-color: #fffffe">
                    <div class="mb-3">
                        <h2>Tambah Cash</h2>
                    </div>
                    <form wire:submit="save" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-3 col-md-6 col-sm-12">
                                    <label for="kegiatan" class="form-label">Kegiatan</label>
                                    <select class="form-control" id="kegiatan" wire:model="activity_id">
                                        <option value="">-- Pilih Kegiatan --</option>
                                        @foreach ($kegiatanList as $kegiatan)
                                            <option value="{{ $kegiatan->id }}">{{ $kegiatan->judul }}</option>
                                        @endforeach
                                    </select>
                                    @error('activity_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="pengeluaran" class="form-label">Pengeluaran</label>
                                    <input type="text" class="form-control" id="pengeluaran"
                                        wire:model='pengeluaran'>
                                    <div style="color: red; font-size: 12px">
                                        @error('pengeluaran')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="pemasukan" class="form-label">Pemasukan</label>
                                    <input type="text" class="form-control" id="pemasukan" wire:model='pemasukan'>
                                    <div style="color: red; font-size: 12px">
                                        @error('pemasukan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="text" class="form-control" id="tanggal" wire:model='tanggal'>
                                    <div style="color: red; font-size: 12px">
                                        @error('tanggal')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-1 justify-content-between d-flex">
                                    <button type="button" class="button btn-delete"><a
                                            href="{{ route('anggota.index') }}">Back</a></button>
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

@push('scripts')
    <script>
        $(document).ready(function() {

            // const flatpickr = require("flatpickr");
            $("#tanggal").flatpickr({
                // enableTime: true,
                dateFormat: "Y-m-d",
                locale: "id"
                // altInput: true,
                // dateFormat: "Y-m-d",
                // locale: "id"
            });
        });
    </script>
@endpush
