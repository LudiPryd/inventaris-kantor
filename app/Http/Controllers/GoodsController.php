<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $goods = Goods::all();
        return view('goods.index', compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('goods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang'       => 'required|string|max:255',
            'kategori'          => 'required|string|max:255',
            'tgl_pembelian'     => 'required|date',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/goods', $imageName);
        }
        
        Goods::create([
            'image'           => $imageName,
            'nama_barang'     => $request->nama_barang,
            'kategori'        => $request->kategori,
            'tgl_pembelian'   => $request->tgl_pembelian
        ]);

        
        return redirect()->route('goods.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $goods = Goods::findOrFail($id);

        return view('goods.show', compact('goods'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $goods = Goods::findOrFail($id);

        return view('goods.edit', compact('goods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang'       => 'required|string|max:255',
            'kategori'          => 'required|string|max:255',
            'tgl_pembelian'     => 'required|date',
        ]);

        $goods = Goods::findOrFail($id);

        if ($request->hasFile('image')) {
            Storage::delete('goods/'.$goods->image);

            $image = $request->file('image');
            $image->storeAs('goods', $image->hashName());

            $goods->update([
                'image'           => $image->hashName(),
                'nama_barang'     => $request->nama_barang,
                'kategori'        => $request->kategori,
                'tgl_pembelian'   => $request->tgl_pembelian
            ]);
        } else {
            $goods->update([
                'nama_barang'     => $request->nama_barang,
                'kategori'        => $request->kategori,
                'tgl_pembelian'   => $request->tgl_pembelian
            ]);
        }

        return redirect()->route('goods.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $goods = Goods::findOrFail($id);

        Storage::delete('goods/'.$goods->image);

        $goods->delete();

        return redirect()->route('goods.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
