<?php

namespace App\Http\Controllers;

use App\DataTables\PenjualanDataTable;
use App\Models\Usermodel;
use App\Models\Penjualanmodel;
use App\Models\Detailpenjualanmodel;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class Penjualancontroller extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Transaksi Penjualan',
            'list' => ['Home', 'Transaksi Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar Transaksi Penjualan',
        ];

        $activeMenu = 'penjualan';

        $user = UserModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'user' => $user]);
    }

    public function list(Request $request)
    {
        $penjualans = PenjualanModel::select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal', 'pembeli', 'user_id')
            ->with('user');

        if ($request->user_id) {
            $penjualans->where('user_id', $request->user_id);
        }

        return DataTables::of($penjualans)
            ->addIndexColumn()

            ->addColumn('total_barang', function ($penjualan) {
                $total_barang = Detailpenjualanmodel::where('penjualan_id', $penjualan->penjualan_id)->sum('jumlah');
                return $total_barang;
            })

            ->addColumn('total_harga', function ($penjualan) {
                $total_harga = Detailpenjualanmodel::where('penjualan_id', $penjualan->penjualan_id)->sum('harga');
                return 'Rp ' . number_format($total_harga, 0, ',', '.');
            })

            ->addColumn('action', function ($penjualan) {
                $btn  = '<a href="' . url('/penjualan/' . $penjualan->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penjualan/' . $penjualan->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $penjualan->penjualan_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Penjualan',
            'list' => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Penjualan',
        ];

        $user = UserModel::all();
        $activeMenu = 'penjualan';

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required',
            'pembeli' => 'required',
            'user_id' => 'required',
        ]);

        PenjualanModel::create([
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'pembeli' => $request->pembeli,
            'user_id' => $request->user_id,
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $penjualan = PenjualanModel::with('user')->find($id);

        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list'  => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail penjualan'
        ];

        $activeMenu = 'penjualan'; // set menu yang sedang aktif

        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Penjualan',
            'list' => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Penjualan',
        ];

        $activeMenu = 'penjualan';

        $penjualan = PenjualanModel::find($id);
        $user = UserModel::all();

        return view('penjualan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan' => $penjualan, 'user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required',
            'pembeli' => 'required',
            'user_id' => 'required',
        ]);

        PenjualanModel::find($id)->update([
            'penjualan_kode' => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'pembeli' => $request->pembeli,
            'user_id' => $request->user_id,
        ]);

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $check = Penjualanmodel::find($id);
        if (!$check) {
            return redirect('/penjualan')->with('error', 'Data Penjualan tidak ditemukan');
        }

        try {
            Penjualanmodel::destroy($id);

            return redirect('/penjualan')->with('success', 'Data Penjualan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('/penjualan')->with('error', 'Data Penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
