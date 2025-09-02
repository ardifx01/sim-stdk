<div>
    <div class="container mt-5">
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

            <a href="{{ route('profil.update') }}" class="text-white text-decoration-none">Update Profil</a>
        </div>
    </div>
</div>
