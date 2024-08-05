@extends('layouts.main')

@section('title', 'Daftar Pengguna')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Pengguna</h4>
                        <a href="{{ route('admin.addusers.create') }}" class="btn btn-primary">Tambah Pengguna</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->jabatan->name }}</td>
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
                                            <td class="text-nowrap">
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton-{{ $user->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $user->id }}">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.addusers.show', $user->id) }}">Lihat</a>
                                                        </li>
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.addusers.edit', $user->id) }}">Ubah</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('admin.addusers.destroy', $user->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item">Hapus</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
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
@endsection
