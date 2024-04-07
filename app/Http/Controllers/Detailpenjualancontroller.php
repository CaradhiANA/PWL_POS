<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenjualanModel;
use App\Models\DetailpenjualanModel;
use App\Models\BarangModel;
use Yajra\DataTables\Facades\DataTables;

class DetailpenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar Detail Penjualan',
        ];

        $activeMenu = 'detailpenjualan';

        $barang = BarangModel::all();
        $penjualan = penjualanModel::all();

        return view('detailpenjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang, 'penjualan' => $penjualan]);
    }

    public function list(Request $request)
    {
        $details = DetailpenjualanModel::select('detail_id', 'jumlah', 'harga', 'barang_id', 'penjualan_id')
            ->with('barang', 'penjualan');

        if ($request->barang_id) {
            $details->where('barang_id', $request->barang_id);
        }

        if ($request->penjualan_id) {
            $details->where('penjualan_id', $request->penjualan_id);
        }

        return DataTables::of($details)
            ->addIndexColumn()
            ->addColumn('action', function ($detail) {
                $btn  = '<a href="' . url('/detailpenjualan/' . $detail->detail_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/detailpenjualan/' . $detail->detail_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/detailpenjualan/' . $detail->detail_id) . '">'
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
            'title' => 'Tambah Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Detail Penjualan',
        ];

        $activeMenu = 'detailpenjualan';

        $barang = BarangModel::all();
        $penjualan = PenjualanModel::all();

        return view('detailpenjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang, 'penjualan' => $penjualan]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required',
            'harga' => 'required',
            'barang_id' => 'required',
            'penjualan_id' => 'required'
        ]);

        Detailpenjualanmodel::create($request->all());

        return redirect('/detailpenjualan')->with('success', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Detail Penjualan',
        ];

        $activeMenu = 'detailpenjualan';

        $detail = Detailpenjualanmodel::with('barang', 'penjualan')->find($id);

        return view('detailpenjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'detail' => $detail]);
    }

    public function edit(String $id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Detail Penjualan',
            'list' => ['Home', 'Detail Penjualan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Detail Penjualan',
        ];

        $activeMenu = 'detailpenjualan';

        $barang = BarangModel::all();
        $penjualan = PenjualanModel::all();
        $detail = Detailpenjualanmodel::find($id);

        return view('detailpenjualan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang, 'penjualan' => $penjualan, 'detail' => $detail]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required',
            'harga' => 'required',
            'barang_id' => 'required',
            'penjualan_id' => 'required'
        ]);

        Detailpenjualanmodel::find($id)->update($request->all());

        return redirect('/detailpenjualan')->with('success', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $check = Detailpenjualanmodel::find($id);
        if (!$check) {
            return redirect('/detailpenjualan')->with('error', 'Data Detail Penjualan tidak ditemukan');
        }

        try {
            Detailpenjualanmodel::destroy($id);

            return redirect('/detailpenjualan')->with('success', 'Data Detail Penjualan berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            return redirect('/detailpenjualan')->with('error', 'Data Detail Penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}