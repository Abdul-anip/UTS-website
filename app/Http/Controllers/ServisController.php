<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servis;
use Carbon\Carbon;



class ServisController extends Controller
{
    public function index()
    {
        $servis = Servis::paginate(7);
        return view('servis.index', compact('servis'));
    }

    public function create()
    {
        return view('servis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pemilik' => 'required',
            'no_polisi' => 'required',
            'jenis_kendaraan' => 'required',
            'keluhan' => 'required',
            'jenis_servis' => 'required',
            'tanggal_servis' => 'required|date',
            'biaya' => 'required|numeric',
            'status' => 'required|in:menunggu,dikerjakan,selesai',
        ]);

        Servis::create($request->all());

        return redirect()->route('servis.index');
    }

    public function edit($id)
    {
        $servis = Servis::findOrFail($id);  // Ambil data servis berdasarkan ID
        $servis->tanggal_servis = Carbon::parse($servis->tanggal_servis);
        return view('servis.edit', compact('servis')); // Mengirimkan data servis ke view
    }

    public function update(Request $request, $id)
    {
        $servis = Servis::findOrFail($id); // Cari data servis yang akan diupdate
    
        // Validasi data input
        $validatedData = $request->validate([
            'nama_pemilik' => 'required|string|max:255',
            'no_polisi' => 'required|string|max:20',
            'jenis_kendaraan' => 'required|string',
            'keluhan' => 'required|string',
            'jenis_servis' => 'required|string',
            'tanggal_servis' => 'required|date',
            'biaya' => 'required|numeric',
            'status' => 'required|string',
        ]);
    
        // Update data servis
        $servis->update($validatedData);
    
        return redirect()->route('servis.index')->with('success', 'Servis berhasil diupdate');
    }

    public function destroy($id)
    {
        $servis = Servis::findOrFail($id); // Ambil data servis berdasarkan ID

    // Soft delete
    $servis->delete();

    return redirect()->route('servis.index')->with('success', 'Servis berhasil dihapus');
    }

    public function trashed()
    {
        $trashedServis = \App\Models\Servis::onlyTrashed()->paginate(7);
        return view('servis.trashed', compact('trashedServis'));
    }

    public function restore($id)
    {
        // Cari data servis yang di-soft delete berdasarkan ID
        $servis = Servis::onlyTrashed()->findOrFail($id);
    
        // Lakukan restore data
        $servis->restore();
    
        // Redirect ke halaman trashed dengan pesan sukses
        return redirect()->route('servis.trashed')->with('success', 'Servis berhasil dipulihkan');
    }

    public function show($id)
{
    // Mencari servis berdasarkan ID
    $servis = Servis::findOrFail($id);

    // Menampilkan view dengan data servis
    return view('servis.show', compact('servis'));
}

    
}
