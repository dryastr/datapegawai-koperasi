<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::whereHas('role', function ($query) {
            $query->where('name', 'user');
        })->select('id', 'name', 'alamat', 'jabatan_id', 'tgl_mcu', 'induksi', 'tgl_keluar', 'no_hp', 'keterangan')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Alamat',
            'Jabatan',
            'Tanggal MCU',
            'Induksi',
            'Tanggal Keluar',
            'No HP',
            'Keterangan',
        ];
    }
}
