@extends('layouts.main')

@section('title', 'Daftar Jabatan')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title">Daftar Jabatan</h4>
                        <a href="{{ route('admin.jabatans.create') }}" class="btn btn-success btn-sm ms-auto">Tambah
                            Jabatan</a>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="TableJabatans" class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jabatans as $jabatan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $jabatan->name }}</td>
                                            <td class="text-nowrap">
                                                <div class="dropdown dropup">
                                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton-{{ $jabatan->id }}"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu"
                                                        aria-labelledby="dropdownMenuButton-{{ $jabatan->id }}">
                                                        <li><a class="dropdown-item"
                                                                href="{{ route('admin.jabatans.edit', $jabatan->id) }}">Ubah</a>
                                                        </li>
                                                        <li>
                                                            <form
                                                                action="{{ route('admin.jabatans.destroy', $jabatan->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus jabatan ini?')">
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
