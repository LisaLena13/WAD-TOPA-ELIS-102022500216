<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        return view('barangs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Barang::create($request->all());

        return redirect()->route('barangs.index')
                         ->with('success', 'Data barang berhasil ditambahkan.');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barangs.index')
                         ->with('success', 'Data barang berhasil dihapus.');
    }
}