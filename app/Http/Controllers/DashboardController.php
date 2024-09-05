<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Siswa as S;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            dd($request->all());
            $siswa = S::select('id', 'nama', 'nis', 'alamat');
            return DataTables::of($siswa)
                ->addIndexColumn()
                ->addColumn('action', function ($siswa) {
                    $btn = '<button onclick="openEditModal('.$siswa->id.', \''.$siswa->nama.'\', \''.$siswa->nis.'\', \''.$siswa->alamat.'\')" class="edit btn btn-info btn-sm">Edit</button>';
                    $btn .= '<a href="javascript:void(0)" onclick="confirmDelete(' . $siswa->id . ')" class="delete btn btn-danger btn-sm ms-2">Delete</a>';
                    $btn .= '<form id="delete-form-' . $siswa->id . '" action="' . route('siswa.destroy', $siswa->id) . '" method="POST" style="display: none;">
                                        ' . csrf_field() . '
                                        ' . method_field('DELETE') . '
                                     </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.index');
    }
}
