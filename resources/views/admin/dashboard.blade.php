@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Pengguna</h4>
                        <a href="{{ route('admin.export.users') }}" class="btn btn-success">Export Excel</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="active-tab" data-bs-toggle="tab" href="#active"
                                    role="tab" aria-controls="active" aria-selected="true">Pegawai Aktif</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="inactive-tab" data-bs-toggle="tab" href="#inactive" role="tab"
                                    aria-controls="inactive" aria-selected="false">Pegawai Non-Aktif</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="active" role="tabpanel"
                                aria-labelledby="active-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                                <th>Alamat</th>
                                                <th>Nomor HP</th>
                                                <th>Tanggal MCU</th>
                                                <th>Tanggal Induksi</th>
                                                <th>Tanggal Masuk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($activeUsers as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->jabatan ? $user->jabatan->name : 'N/A' }}</td>
                                                    <td>{{ $user->alamat }}</td>
                                                    <td>{{ $user->no_hp }}</td>
                                                    <td>{{ $user->tgl_mcu ? \Carbon\Carbon::parse($user->tgl_mcu)->format('d-m-Y') : 'N/A' }}
                                                    </td>
                                                    <td>{{ $user->induksi ? \Carbon\Carbon::parse($user->induksi)->format('d-m-Y') : 'N/A' }}
                                                    </td>
                                                    <td>{{ $user->tgl_masuk ? \Carbon\Carbon::parse($user->tgl_masuk)->format('d-m-Y') : 'N/A' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="inactive" role="tabpanel" aria-labelledby="inactive-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Jabatan</th>
                                                <th>Alamat</th>
                                                <th>Nomor HP</th>
                                                <th>Tanggal MCU</th>
                                                <th>Tanggal Induksi</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Tanggal Keluar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inactiveUsers as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->jabatan ? $user->jabatan->name : 'N/A' }}</td>
                                                    <td>{{ $user->alamat }}</td>
                                                    <td>{{ $user->no_hp }}</td>
                                                    <td>{{ $user->tgl_mcu ? \Carbon\Carbon::parse($user->tgl_mcu)->format('d-m-Y') : 'N/A' }}
                                                    </td>
                                                    <td>{{ $user->induksi ? \Carbon\Carbon::parse($user->induksi)->format('d-m-Y') : 'N/A' }}
                                                    </td>
                                                    <td>{{ $user->tgl_masuk ? \Carbon\Carbon::parse($user->tgl_masuk)->format('d-m-Y') : 'N/A' }}
                                                    </td>
                                                    <td>{{ $user->tgl_keluar ? \Carbon\Carbon::parse($user->tgl_keluar)->format('d-m-Y') : 'N/A' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
