<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\Kategorimodel;
use Illuminate\Http\Request;

class Kategoricontroller extends Controller
{
    public function index(KategoriDataTable $datatable)
    {
        return $datatable->render('kategori.index');
    }
    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        Kategorimodel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }
    
    public function destroy($id)
    {
        KategoriModel::destroy($id);
        return redirect('/kategori');
    }

    public function show($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;
        $kategori->save();
        return redirect('/kategori');
    }

}