<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert; // Jika Anda menggunakan SweetAlert

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
       
        return view('pages.admin.distributors.index', compact('distributors'));
    }
    
    public function create()
    {
        // Menampilkan form tambah distributor
        return view('pages.admin.distributors.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data distributor baru
        $request->validate([
            'nama_distributor' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email|unique:distributors',
        ]);

        Distributor::create($request->all());
        Alert::success('Berhasil!', 'Distributor berhasil ditambahkan!');
        return redirect()->route('admin.distributors.index');
    }

    public function edit($id)
    {
        // Menampilkan form edit distributor
        $distributor = Distributor::findOrFail($id);
        return view('pages.admin.distributors.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        // Validasi dan update data distributor
        $request->validate([
            'nama_distributor' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kontak' => 'required',
            'email' => 'required|email|unique:distributors,email,' . $id,
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());
        Alert::success('Berhasil!', 'Distributor berhasil diperbarui!');

        return redirect()->route('admin.distributors.index');
    }

    public function destroy($id)
    {
        // Hapus data distributor
        $distributor = Distributor::findOrFail($id);
        confirmDelete('Hapus Date', 'Apakah anda yakin ingin menghapus data ini?');
        return redirect()->route('admin.distributors.index');
    }
}
