<div>
    <x-header page="Data Galery STT" title="Data Galery STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">
        <x-slot:logout>
            @livewire('auth.logout')
        </x-slot:logout>
    </x-header>

    <div class="p-3">
        <div class="col-md-12 d-flex justify-content-between">
            @if (Auth::user()->hasManagementRoleForGaleri())
                <x-button class="mb-2 button-add">
                    <a href="{{ route('galeri.create') }}">Tambah Foto</a>
                </x-button>
            @endif
        </div>
        <div class="pb-5">
            <div class="p-2 border shadow-table rounded-3">
                <div class="pt-2 col-md-12">
                    <div class="d-flex justify-content-between">
                        <div class="mb-3 col-md-8 text-start">
                            <div class="align-items-center d-flex col-md-2">
                                <div>Show</div>
                                <select wire:model.live="perPage" class="mx-2 form-select form-select-sm"
                                    style="width: 70px;">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option selected value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="200">200</option>
                                </select>
                                <div>Entries</div>
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <label for="search" class="form-label">Search:</label>
                            <input type="text" id="search" class="form-control d-inline-block form-select-sm"
                                style="width: 200px;" wire:model.live.debounce.300ms="search">
                        </div>
                    </div>
                </div>
                <div class="pb-3 col-md-12">
                    <table class="table table-sortable table-bordered ">
                        <thead class="">
                            <tr>
                                <th class="sort">#</th>
                                <th class="sort">Judul Foto</th>
                                <th class="sort">Keterangan</th>
                                <th class="sort">Tanggal</th>
                                <th class="sort">Tampilkan</th>
                                <th class="sort">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                                <tr wire:key="{{ $item->id }}">
                                    <td>{{ $items->firstItem() + $key }}</td>
                                    <td>{!! Str::limit($item->judul, 40) !!}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                    <td>{{ $item->status->label() }}</td>
                                    <td>
                                        {{-- button detail --}}
                                        <button class="mr-1 mb-md-1 button btn-detail">
                                            <a href="{{ route('galeri.show', $item->id) }}">
                                                <svg width="24" height="24" viewBox="0 0 25 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.0234 7.625C9.60719 7.625 7.64844 9.58375 7.64844 12C7.64844 14.4162 9.60719 16.375 12.0234 16.375C14.4397 16.375 16.3984 14.4162 16.3984 12C16.3984 9.58375 14.4397 7.625 12.0234 7.625ZM9.14844 12C9.14844 10.4122 10.4356 9.125 12.0234 9.125C13.6113 9.125 14.8984 10.4122 14.8984 12C14.8984 13.5878 13.6113 14.875 12.0234 14.875C10.4356 14.875 9.14844 13.5878 9.14844 12Z"
                                                        fill="#ffff" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M12.0234 4.5C7.71145 4.5 3.99772 7.05632 2.30101 10.7351C1.93091 11.5375 1.93091 12.4627 2.30101 13.2652C3.99772 16.9439 7.71145 19.5002 12.0234 19.5002C16.3353 19.5002 20.049 16.9439 21.7458 13.2652C22.1159 12.4627 22.1159 11.5375 21.7458 10.7351C20.049 7.05633 16.3353 4.5 12.0234 4.5ZM3.66311 11.3633C5.12472 8.19429 8.32017 6 12.0234 6C15.7266 6 18.922 8.19429 20.3836 11.3633C20.5699 11.7671 20.5699 12.2331 20.3836 12.6369C18.922 15.8059 15.7266 18.0002 12.0234 18.0002C8.32017 18.0002 5.12472 15.8059 3.66311 12.6369C3.47688 12.2331 3.47688 11.7671 3.66311 11.3633Z"
                                                        fill="#ffff" />
                                                </svg>
                                            </a>
                                        </button>
                                        @if (Auth::user()->hasManagementRoleForGaleri())
                                            {{-- button update --}}
                                            <button class="mr-1 mb-md-1 button btn-update">
                                                <a href="{{ route('galeri.edit', $item->id) }}">
                                                    <svg width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        transform="rotate(0 0 0)">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M20.8749 2.51272C20.1915 1.8293 19.0835 1.8293 18.4001 2.51272L13.2418 7.67095C12.879 8.03379 12.6511 8.50974 12.5959 9.0199L12.4069 10.7668C12.3824 10.9926 12.4616 11.2173 12.6222 11.3778C12.7827 11.5384 13.0074 11.6176 13.2332 11.5931L14.9801 11.4041C15.4903 11.3489 15.9662 11.121 16.3291 10.7582L21.4873 5.59994C22.1707 4.91652 22.1707 3.80848 21.4873 3.12506L20.8749 2.51272ZM18.5981 4.43601L19.564 5.40191L15.2684 9.69751C15.1474 9.81846 14.9888 9.89443 14.8187 9.91283L13.9984 10.0016L14.0872 9.18126C14.1056 9.01121 14.1815 8.85256 14.3025 8.73161L18.5981 4.43601Z"
                                                            fill="#ffff" />
                                                        <path
                                                            d="M5.5 3.25H15.5411L14.0411 4.75H5.5C5.08579 4.75 4.75 5.08579 4.75 5.5V18.5C4.75 18.9142 5.08579 19.25 5.5 19.25H18.5C18.9142 19.25 19.25 18.9142 19.25 18.5V9.95823L20.75 8.45823V18.5C20.75 19.7426 19.7426 20.75 18.5 20.75H5.5C4.25736 20.75 3.25 19.7426 3.25 18.5V5.5C3.25 4.25736 4.25736 3.25 5.5 3.25Z"
                                                            fill="#ffff" />
                                                    </svg></a>
                                            </button>
                                            {{-- button delete --}}
                                            <button class="mr-1 mb-md-1 button btn-delete " data-confirm-delete="true"
                                                wire:click="delete_confirmation({{ $item->id }})"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <a href=""></a>
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" transform="rotate(0 0 0)">
                                                    <path
                                                        d="M14.7223 12.7585C14.7426 12.3448 14.4237 11.9929 14.01 11.9726C13.5963 11.9522 13.2444 12.2711 13.2241 12.6848L12.9999 17.2415C12.9796 17.6552 13.2985 18.0071 13.7122 18.0274C14.1259 18.0478 14.4778 17.7289 14.4981 17.3152L14.7223 12.7585Z"
                                                        fill="#ffff" />
                                                    <path
                                                        d="M9.98802 11.9726C9.5743 11.9929 9.25542 12.3448 9.27577 12.7585L9.49993 17.3152C9.52028 17.7289 9.87216 18.0478 10.2859 18.0274C10.6996 18.0071 11.0185 17.6552 10.9981 17.2415L10.774 12.6848C10.7536 12.2711 10.4017 11.9522 9.98802 11.9726Z"
                                                        fill="#ffff" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10.249 2C9.00638 2 7.99902 3.00736 7.99902 4.25V5H5.5C4.25736 5 3.25 6.00736 3.25 7.25C3.25 8.28958 3.95503 9.16449 4.91303 9.42267L5.54076 19.8848C5.61205 21.0729 6.59642 22 7.78672 22H16.2113C17.4016 22 18.386 21.0729 18.4573 19.8848L19.085 9.42267C20.043 9.16449 20.748 8.28958 20.748 7.25C20.748 6.00736 19.7407 5 18.498 5H15.999V4.25C15.999 3.00736 14.9917 2 13.749 2H10.249ZM14.499 5V4.25C14.499 3.83579 14.1632 3.5 13.749 3.5H10.249C9.83481 3.5 9.49902 3.83579 9.49902 4.25V5H14.499ZM5.5 6.5C5.08579 6.5 4.75 6.83579 4.75 7.25C4.75 7.66421 5.08579 8 5.5 8H18.498C18.9123 8 19.248 7.66421 19.248 7.25C19.248 6.83579 18.9123 6.5 18.498 6.5H5.5ZM6.42037 9.5H17.5777L16.96 19.7949C16.9362 20.191 16.6081 20.5 16.2113 20.5H7.78672C7.38995 20.5 7.06183 20.191 7.03807 19.7949L6.42037 9.5Z"
                                                        fill="#ffff" />
                                                </svg>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mx-2 mt-2 d-flex justify-content-between align-items-center">
                        {{-- {{ $items->links('pagination::bootstrap-5') }} --}}
                        <div>
                            <p class="small text-muted">
                                Showing <span class="fw-semibold">{{ $start }}</span>
                                to <span class="fw-semibold">{{ $end }}</span>
                                of <span class="fw-semibold">{{ $total }}</span>
                                results
                            </p>
                        </div>
                        <div>
                            {{ $items->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Hapus Data ?</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin akan menghapus Foto yang dipilih?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" wire:click="delete()"
                        data-bs-dismiss="modal">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>
