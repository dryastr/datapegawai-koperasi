@extends('layouts.main')

@section('title', 'Edit Pengguna')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Pengguna</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('admin.addusers.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email', $user->email) }}" required>
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
                                <select class="form-select @error('jabatan_id') is-invalid @enderror" id="jabatan_id"
                                    name="jabatan_id">
                                    <option value="">Pilih Jabatan</option>
                                    @foreach ($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}"
                                            {{ $user->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                                            {{ $jabatan->name }}
                                        </option>
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
                                    id="alamat" name="alamat" value="{{ old('alamat', $user->alamat) }}">
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_hp" class="form-label">Nomor HP</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                    id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl_mcu" class="form-label">Tanggal MCU</label>
                                <input type="date" class="form-control @error('tgl_mcu') is-invalid @enderror"
                                    id="tgl_mcu" name="tgl_mcu" value="{{ old('tgl_mcu', $user->tgl_mcu) }}">
                                @error('tgl_mcu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="induksi" class="form-label">Tanggal Induksi</label>
                                <input type="date" class="form-control @error('induksi') is-invalid @enderror"
                                    id="induksi" name="induksi" value="{{ old('induksi', $user->induksi) }}">
                                @error('induksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror"
                                    id="tgl_masuk" name="tgl_masuk" value="{{ old('tgl_masuk', $user->tgl_masuk) }}">
                                @error('tgl_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl_keluar" class="form-label">Tanggal Keluar</label>
                                <input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror"
                                    id="tgl_keluar" name="tgl_keluar"
                                    value="{{ old('tgl_keluar', $user->tgl_keluar) }}">
                                @error('tgl_keluar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="keterangan">Keterangan</label>
                                <textarea id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                    placeholder="Keterangan">{{ old('keterangan', $user->keterangan) }}</textarea>
                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Ubah</button>
                                <a href="{{ route('admin.addusers.index') }}" class="btn btn-light-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
