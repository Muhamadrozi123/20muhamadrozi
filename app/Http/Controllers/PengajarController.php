<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Pengajaran;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index()
    {
        $pengajarans = Pengajaran::orderByDesc('created_at')->paginate(5);
        return view('pengajar.index', compact('pengajarans'));
    }


    public function create()
    {
        $data = Guru::all();
        $data2 = Mapel::all();
        return view('pengajar.create', compact('data', 'data2'));
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_guru' => 'required',
            'id_mapel' => 'required',
            'kelas' => 'required',
            'jam_pelajaran' => 'required',
        ]);

        Pengajaran::create([
            'id_guru' => $request->id_guru,
            'id_mapel' => $request->id_mapel,
            'kelas' => $request->kelas,
            'jam_pelajaran' => $request->jam_pelajaran
        ]);

        return redirect()->route('pengajar.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit($id)
    {
        $pengajar = Pengajaran::findOrFail($id);
        $data = Guru::all();
        $data2 = Mapel::all();
        return view('pengajar.edit', compact('pengajar', 'data', 'data2'));
    }

    public function update(Request $request, $id)
    {
        // return('ok');
        $this->validate($request, [
            'id_guru' => 'required',
            'id_mapel' => 'required',
            'kelas' => 'required',
            'jam_pelajaran' => 'required',
        ]);

        $pengajar = Pengajaran::find($id);
        // dd($pengajar);
        // $pengajar->id_guru = $request->id_guru;
        // $pengajar->id_mapel = $request->id_mapel;
        // $pengajar->kelas = $request->kelas;
        // $pengajar->jam_pelajaran = $request->jam_pelajaran;
        // $pengajar->update($request->all());

        // return response()->json($pengajar);

        $pengajar->update([
            'id_guru' => $request->id_guru,
            'id_mapel' => $request->id_mapel,
            'kelas' => $request->kelas,
            'jam_pelajaran' => $request->jam_pelajaran
        ]);

        return redirect()->route('pengajar.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroy(Request $request, $id)
    {
        $pengajar = Pengajaran::find($id);
        // return $guru;
        $pengajar->delete();

        //redirect to index
        return redirect()->route('pengajar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

}