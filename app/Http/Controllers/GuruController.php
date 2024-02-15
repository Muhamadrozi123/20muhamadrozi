<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::orderBy('id')->paginate(5);
        return view('guru.index', compact('gurus'));
    }
    public function create()
    {
        return view('guru.create');
    }
    public function edit(Guru $guru)
    {
        return view('guru.edit', compact('guru'));
    }
    public function update(Request $request, Guru $guru)
    {
        //validate form
        $this->validate($request, [
            'gambar'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama'     => 'required|min:5',
            'no_hp'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('gambar')) {

            //upload new image
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/posts', $gambar->hashName());

            //delete old image
            Storage::delete('public/posts/'.$guru->gambar);

            //update post with new image
            $guru->update([
                'gambar'     => $gambar->hashName(),
                'nama'     => $request->nama,
                'no_hp'   => $request->no_hp
            ]);
            
        } else {

            //update post without image
            $guru->update([
                'nama'     => $request->nama,
                'no_hp'   => $request->no_hp
            ]);
        }

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|min:5',
            'no_hp' => 'required|min:10'
        ]);

        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/posts', $gambar->hashName());

        //create post
        Guru::create([
            'gambar' => $gambar->hashName(),
            'nama' => $request->nama,
            'no_hp' => $request->no_hp
        ]);

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(Guru $guru)
    {
        //deletegambar
        Storage::delete('public/posts/' . $guru->foto);

        //delete post
        $guru->delete();

        //redirect to index
        return redirect()->route('guru.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
}
