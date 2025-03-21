<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $tracks = Track::with('goods')->get();
        return view('tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $goods = Goods::all();
        return view('tracks.create', compact('goods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'cabang' => 'required|string|max:255',
            'lantai' => 'required|string|max:255',
            'ruangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kondisi' => 'required|string|max:255',
            'kondisi' => 'required|in:baru,bekas,rusak',

        ]);

        Track::create([
            'goods_id' => $request->goods_id,
            'cabang' => $request->cabang,
            'lantai' => $request->lantai,
            'ruangan' => $request->ruangan,
            'tanggal' => $request->tanggal,
            'kondisi' => $request-> kondisi,
        ]);

        return redirect()->route('tracks.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        $goods = Goods::all();

        return view('tracks.edit', compact('track', 'goods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
         
        $request->validate([
            'goods_id' => 'required|exists:goods,id',
            'cabang' => 'required|string|max:255',
            'lantai' => 'required|string|max:255',
            'ruangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kondisi' => 'required|in:baru,bekas,rusak',
        ]);

        $track->update([
            'goods_id' => $request->goods_id,
            'cabang' => $request->cabang,
            'lantai' => $request->lantai,
            'ruangan' => $request->ruangan,
            'tanggal' => $request->tanggal,
            'kondisi' => $request->kondisi,
        ]);

    
        return redirect()->route('tracks.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->delete();

        return redirect()->route('tracks.index')->with('success', 'Data berhasil dihapus!');
    }
}
