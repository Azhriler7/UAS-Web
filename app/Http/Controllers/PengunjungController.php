<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pengunjung::query();

        if ($request->filled('kewarganegaraan')) {
            $query->where('kewarganegaraan', $request->kewarganegaraan);
        }

        if ($request->filled('jenis_kelamin')) {
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $pengunjungData = $query->latest()->paginate(10);

        return view('pengunjung.index', compact('pengunjungData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengunjung.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'umur' => 'required|integer',
            'asal' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tgl_kunjungan' => 'required|date',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
        ]);

        Pengunjung::create($request->all());

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengunjung $pengunjung) 
    {
        return view('pengunjung.edit', compact('pengunjung'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengunjung $pengunjung) 
    {
        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
            'umur' => 'required|integer',
            'asal' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'tgl_kunjungan' => 'required|date',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|max:255',
        ]);

        $pengunjung->update($request->all());

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengunjung $pengunjung) 
    {
        $pengunjung->delete();

        return redirect()->route('pengunjung.index')->with('success', 'Pengunjung berhasil dihapus.');
    }

    /**
     * Display statistics of the resource.
     */
    public function statistik()
    {
        $pengunjungData = Pengunjung::all(); // Ambil semua data pengunjung
        return view('statistik.index', compact('pengunjungData'));
    }
}