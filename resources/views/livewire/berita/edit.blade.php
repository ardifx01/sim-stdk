<div>
    <x-header page="Dashboard Berita STT" title="Dashboard Berita STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>
        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            <div class="col-md-9">
                <div class="p-5 border rounded-3 shadow-table" style="background-color: #fffffe">
                    <div class="mb-3">
                        <h2>Tambah Berita</h2>
                    </div>
                    <form wire:submit="updateberita" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="mb-3 col-md-6 col-sm-12">
                                    <label for="judul" class="form-label">Judul
                                        Berita</label>
                                    <input type="text" class="form-control" id="judul" wire:model='judul'>
                                    <div style="color: red; font-size: 12px">
                                        @error('judul')
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
                                <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" wire:model='status'>
                                        <option selected>Pilih Status</option>
                                        @foreach (App\Enums\StatusEnum::cases() as $status)
                                            <option value="{{ $status->value }}">{{ $status->value }}</option>
                                        @endforeach
                                    </select>
                                    <div style="color: red; font-size: 12px">
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="foto" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="foto" wire:model='foto'>
                                    <div style="color: red; font-size: 12px">
                                        @error('foto')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3 col-md-12" wire:ignore>
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea id="summernote" name="keterangan" class="form-control" wire:model='keterangan'></textarea>
                                    <div style="color: red; font-size: 12px">
                                        @error('keterangan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-1 justify-content-between d-flex">
                                    <button type="button" class="button btn-delete"><a
                                            href="{{ route('berita.index') }}">Back</a></button>
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
            $('#summernote').summernote({
                placeholder: 'Ketikan sesuatu...',
                tabsize: 2,
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('#summernote').on('summernote.change', function(we, contents, $editable) {
                @this.set('keterangan', contents);
            });

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
