<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $request->image->store('public/barang');
        }
        $barang = BarangModel::create(
            array_merge(
                $request->all(),
                ['image' => $request->image->hashName()]
            )
        );
        return response()->json($barang, 201);
    }

    public function show(BarangModel $Barang)
    {
        return BarangModel::find($Barang);
    }

    public function update(Request $request, BarangModel $Barang)
    {
        $Barang->update($request->all());
        return BarangModel::find($Barang);
    }

    public function destroy(BarangModel $Barang)
    {
        $Barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}