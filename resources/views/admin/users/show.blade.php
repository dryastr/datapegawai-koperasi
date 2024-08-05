@extends('layouts.main')

@section('title', 'Detail Pengguna')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail Pengguna</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="user-details">
                            <div class="mb-3">
                                <strong>ID:</strong> {{ $user->id }}
                            </div>
                            <div class="mb-3">
                                <strong>Nama:</strong> {{ $user->name }}
                            </div>
                            <div class="mb-3">
                                <strong>Email:</strong> {{ $user->email }}
                            </div>
                            <div class="mb-3">
                                <strong>Jabatan:</strong> {{ $user->jabatan->name ?? 'N/A' }}
                            </div>
                            <div class="mb-3">
                                <strong>Alamat:</strong> {{ $user->alamat }}
                            </div>
                            <div class="mb-3">
                                <strong>Nomor HP:</strong> {{ $user->no_hp }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal MCU:</strong>
                                {{ $user->tgl_mcu ? \Carbon\Carbon::parse($user->tgl_mcu)->format('d-m-Y') : 'N/A' }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal Induksi:</strong>
                                {{ $user->induksi ? \Carbon\Carbon::parse($user->induksi)->format('d-m-Y') : 'N/A' }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal Masuk:</strong>
                                {{ $user->tgl_masuk ? \Carbon\Carbon::parse($user->tgl_masuk)->format('d-m-Y') : 'N/A' }}
                            </div>
                            <div class="mb-3">
                                <strong>Tanggal Keluar:</strong>
                                {{ $user->tgl_keluar ? \Carbon\Carbon::parse($user->tgl_keluar)->format('d-m-Y') : 'N/A' }}
                            </div>
                            <div class="mb-3">
                                <strong>Keterangan:</strong> {{ $user->keterangan }}
                            </div>
                            <a href="{{ route('admin.addusers.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                            <a href="{{ route('admin.addusers.edit', $user->id) }}" class="btn btn-primary mt-3">Ubah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
