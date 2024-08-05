@extends('layouts.main')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pengguna</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('admin.addusers.store') }}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 d-none">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="jabatan_id" class="form-label">Jabatan</label>
                                        <select class="form-select @error('jabatan_id') is-invalid @enderror"
                                            id="jabatan_id" name="jabatan_id">
                                            <option value="">Pilih Jabatan</option>
                                            @foreach ($jabatans as $jabatan)
                                                <option value="{{ $jabatan->id }}">{{ $jabatan->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('jabatan_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            id="alamat" name="alamat" value="{{ old('alamat') }}">
                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">Nomor HP</label>
                                        <input type="number" class="form-control @error('no_hp') is-invalid @enderror"
                                            id="no_hp" name="no_hp" value="{{ old('no_hp') }}">
                                        @error('no_hp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_mcu" class="form-label">Tanggal MCU</label>
                                        <input type="date" class="form-control @error('tgl_mcu') is-invalid @enderror"
                                            id="tgl_mcu" name="tgl_mcu" value="{{ old('tgl_mcu') }}">
                                        @error('tgl_mcu')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="induksi" class="form-label">Tanggal Induksi</label>
                                        <input type="date" class="form-control @error('induksi') is-invalid @enderror"
                                            id="induksi" name="induksi" value="{{ old('induksi') }}">
                                        @error('induksi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                        <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror"
                                            id="tgl_masuk" name="tgl_masuk" value="{{ old('tgl_masuk') }}">
                                        @error('tgl_masuk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
