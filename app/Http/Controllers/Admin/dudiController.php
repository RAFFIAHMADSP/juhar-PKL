<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\dudi;
use Illuminate\Http\Request;

class dudiController extends Controller
{
    public function dudi()
    {

        $dudis = dudi::all();
        return view('admin.dudi',compact('dudis'));
    }

    public function create(){
        return view ('admin.dudi_tambah');
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama_dudi' => 'required|unique:dudi',
            'alamat_dudi' => 'required',

        ]);

        dudi::create([
            'nama_dudi' => $request->nama_dudi,
            'alamat_dudi' => $request->alamat_dudi,

        ]);

        return redirect()->route('admin.dudi')->with('success', 'Berhasil menambahkan DUDI');
    }

    public function edit(string $id)
    {
        $dudi = dudi::find($id);
        if(!$dudi) {
            return back();
        }
        return view('admin.edit_dudi', compact('dudi'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dudi = dudi::find($id);

        $request->validate([
            'nama_dudi' => 'required|unique:dudi,nama_dudi,' . $dudi->id_dudi . ',id_dudi',
            'alamat_dudi' => 'required',
        ]);

        $dudi->update([
            'nama_dudi' => $request->nama_dudi,
            'alamat_dudi' => $request->alamat_dudi,
        ]);

        return redirect()->route('admin.dudi')->with('success',' Data dudi berhasil diupdate');
    }

    public function delete($id){

        $dudi = dudi::find($id);

        $dudi->delete();

        return redirect()->back()->with('success', 'Data guru berhasil dihapus.');

    }


}
