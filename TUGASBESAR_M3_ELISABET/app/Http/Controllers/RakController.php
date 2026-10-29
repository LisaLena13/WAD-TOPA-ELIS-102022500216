<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function index()
    {
        $raks = Rak::all();
        return view('raks.index', compact('raks'));
    }

    public function create()
    {
        return view('raks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaGudang' => 'required',
            'namaZona' => 'required',
            'nomorLorong' => 'required',
            'nomorRak' => 'required',
            'kapasitas' => 'required|numeric|min:1',
        ]);

        Rak::create($request->all());

        return redirect()->route('raks.index')->with('success', 'Data rak berhasil ditambahkan.');
    }

    public function edit(Rak $rak)
    {
        return view('raks.edit', compact('rak'));
    }

    public function update(Request $request, Rak $rak)
    {
        $request->validate([
            'namaGudang' => 'required',
            'namaZona' => 'required',
            'nomorLorong' => 'required',
            'nomorRak' => 'required',
            'kapasitas' => 'required|numeric|min:1',
        ]);

        $rak->update($request->all());

        return redirect()->route('raks.index')->with('success', 'Data rak berhasil diupdate.');
    }

    public function destroy(Rak $rak)
    {
        $rak->delete();

        return redirect()->route('raks.index')->with('success', 'Data rak berhasil dihapus.');
    }
}