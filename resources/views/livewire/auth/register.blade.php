{{-- <div>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Register</h5>
            <form wire:submit="register">
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" wire:model="email">
                    @error('email')
                        <small class="mt-1 d-block text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" wire:model="password">
                    @error('password')
                        <small class="mt-1 d-block text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    Sign Up
                </button>
            </form>
        </div>
    </div>
</div> --}}

<div class="col-md-12">
    <div class="d-flex justify-content-center">
        <div class="col-md-9">
            <div class="p-5 border rounded-3 shadow-table" style="background-color: #fffffe">
                <div class="mb-3">
                    <h2>Register</h2>
                </div>
                <form wire:submit="register" enctype="multipart/form-data">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="mb-3 col-md-6 col-sm-12">
                                <label for="nama" class="form-label">Nama
                                    Lengkap</label>
                                <input type="text" class="form-control" id="nama" wire:model='nama'>
                                <div style="color: red; font-size: 12px">
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" wire:model='email'>
                                <div style="color: red; font-size: 12px">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="text" class="form-control" id="umur" wire:model='umur'>
                                <div style="color: red; font-size: 12px">
                                    @error('umur')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" wire:model='pekerjaan'>
                                <div style="color: red; font-size: 12px">
                                    @error('pekerjaan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" wire:model='alamat'>
                                <div style="color: red; font-size: 12px">
                                    @error('alamat')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="no_telepon" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telepon" wire:model='no_telepon'>
                                <div style="color: red; font-size: 12px">
                                    @error('no_telepon')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" wire:model='jenis_kelamin'>
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="laki laki">Laki - Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                <div style="color: red; font-size: 12px">
                                    @error('jenis_kelamin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            {{-- Password --}}
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    wire:model="password">
                                @error('password')
                                    <small class="mt-1 d-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-3 col-md-6">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" wire:model="password_confirmation">
                                @error('password_confirmation')
                                    <small class="mt-1 d-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="text-end">
                                {{-- <x-button type="submit" class="button btn-update">Submit</x-button> --}}
                                <button type="submit" class="button btn-update">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
