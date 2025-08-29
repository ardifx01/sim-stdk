<div>
    <div>
        <x-header page="Detail Data Anggota STT" title="Detail Data Anggota STT" :username="Auth::user()->nama" :userjabatan="Auth::user()->jabatan->label()">>

            <x-slot:logout>
                @livewire('auth.logout')
            </x-slot:logout>
        </x-header>

        <!-- Flash Message khusus untuk halaman anggota.index -->
        {{-- <div class="p-3">

            <div class="pb-5">
                <div class="p-2 border shadow-table rounded-3">
                    <div class="row align-items-center">
                        <h2 class="my-4 text-center">{{ $user->nama }}</h2>
                        <div class="mb-4 mb-md-0 col-lg-5">
                            <img src="{{ $user->foto }}" alt="foto profil {{ $user->nama }}"
                                class="mx-auto rounded-3 d-block img-fluid">
                        </div>
                        <div class="col-lg-7 ">
                            <div class="col-md-12">
                                <table class="table table-bordered ">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%; scope="col">Nama</th>
                                            <td style="width: 80%;">{{ ucwords($user->nama) }}</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ $user->email }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Umur</th>
                                            <td>{{ $user->umur }}</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">Pekerjaan</th>
                                            <td>{{ ucwords($user->pekerjaan) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat</th>
                                            <td>{{ ucwords($user->alamat) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">No Telepon</th>
                                            <td>{{ $user->no_telepon }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jabatan</th>
                                            <td>{{ $user->jabatan->label() }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">status</th>
                                            <td>{{ $user->status->label() }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Jenis Kelamin</th>
                                            <td>{{ $user->jenis_kelamin->label() }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-between">
                    <x-button class="mt-3 mb-2 text-white btn btn-delete"><a
                            href="{{ route('anggota.index') }}">Back</a></x-button>
                </div>
            </div>
        </div> --}}

        <div class="container">
            <div class="row">
                @if ($user->foto)
                    <div class="mb-sm-3 col-md-4">
                        <div class="p-2 border rounded-3 shadow-table" style="background-color: #fffffe">
                            <div class="profil-foto">
                                <img src="{{ $user->foto }}" class="img-fluid rounded-3"
                                    alt="foto profil {{ $user->nama }}" class="mx-auto rounded-3 d-block img-fluid">
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="p-2 border rounded-3 shadow-table" style="background-color: #fffffe">
                        <div class="p-2 row">
                            <div class=" col-md-6">
                                <div>
                                    <p style="color: #67757c" class="m-0">Nama</p>
                                    <p>{{ $user->nama }}</p>
                                </div>
                                <div>
                                    <p style="color: #67757c" class="m-0">Email</p>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div>
                                    <p style="color: #67757c" class="m-0">Umur</p>
                                    <p>{{ $user->umur }}</p>
                                </div>
                                <div>
                                    <p style="color: #67757c" class="m-0">Alamat</p>
                                    <p>{{ $user->alamat }}</p>
                                </div>
                                <div>
                                    <p style="color: #67757c" class="m-0">Pekerjaan</p>
                                    <p>{{ $user->pekerjaan }}</p>
                                </div>
                            </div>
                            <div class=" col-md-6">
                                <div>
                                    <p style="color: #67757c" class="m-0">No Telepon</p>
                                    <p>{{ $user->no_telepon }}</p>
                                </div>
                                <div>
                                    <p style="color: #67757c" class="m-0">Jabatan</p>
                                    <p>{{ $user->jabatan->label() }}</p>
                                </div>
                                <div>
                                    <p style="color: #67757c" class="m-0">Status</p>
                                    <p>{{ $user->status->label() }}</p>
                                </div>
                                <div>
                                    <p style="color: #67757c" class="m-0">Jenis Kelamin</p>
                                    <p>{{ $user->jenis_kelamin->label() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
