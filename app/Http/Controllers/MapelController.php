<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $mapels = Mapel::orderBy('id')->paginate(5);
        return view('mapel.index', compact('mapels'));
    }
    
    public function create()
    {
        return view('mapel.create');
    }
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [

            'nama_mapel' => 'required',

        ]);

        //create post
        Mapel::create([
            'nama_mapel' => $request->nama_mapel,

        ]);

        //redirect to index
        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, Mapel $mapel)
    {
        //validate form
        $this->validate($request, [
            'nama_mapel' => 'required|min:2',
        ]);

        // Update data
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->save();

        // Redirect ke index
        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy(Mapel $mapel)
    {
        $mapel->delete();
        return redirect()->route('mapel.index')->with(['success' => 'Data Berhasil Dihapus!']);

    }
}

