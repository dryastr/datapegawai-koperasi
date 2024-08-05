<?php

namespace App\Http\Controllers\admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        $activeUsers = User::whereNull('tgl_keluar')
            ->whereHas('role', function ($query) {
                $query->where('name', 'user')->orWhere('id', 2);
            })
            ->get();

        $inactiveUsers = User::whereNotNull('tgl_keluar')
            ->whereHas('role', function ($query) {
                $query->where('name', 'user')->orWhere('id', 2);
            })
            ->get();

        return view('admin.dashboard', compact('activeUsers', 'inactiveUsers'));
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
