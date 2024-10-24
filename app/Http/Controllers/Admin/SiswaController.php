<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function siswa($id) {

        $siswas = siswa::where('id_pembimbing',$id)->get();
        $siswa = siswa::where('id_pembimbing', $id)->first();
        return view('admin.siswa', compact('siswas', 'siswa', 'id'));
    }

    public function create($id){

        return view('admin.tambah_siswa', compact('id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn|digits:10',
            'nama_siswa' => 'required',
            'password' => 'required|min:8',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',

        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $uniqueField = uniqid() .'_'.$request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs('foto_siswa',$uniqueField, 'public');

            $foto = 'foto_siswa/' . $uniqueField;
        }

        siswa::create([
            'id_pembimbing' => $id,
           'nisn' => $request->nisn,
            'password' => Hash::make($request->password),
            'nama_siswa' => $request->nama_siswa,
            'foto' => $foto,
        ]);

        return redirect()->route('admin.pembimbing_siswa', $id)->with('success', 'Data siswa berhasil ditamabah');
    }

    public function edit(string $id, $id_siswa)
    {
        $siswa = siswa::find($id_siswa);
        return view('admin.edit_siswa', compact('siswa', 'id'));
    }

    public function update(Request $request, string $id, $id_siswa)
    {
        $siswa = siswa::find($id_siswa);

        $request->validate([
            'nisn' => 'required|digits:10|unique:siswa,nisn,' . $siswa->id_siswa . ',id_siswa',
            'password' => 'nullable|min:8',
            "nama_siswa" => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $foto = $siswa->foto;

        if ($request->hasFile('foto')) {
            if ($foto) {
                Storage::disk('public')->delete('$foto');
            }
            $uniqueField = uniqid() . '_' . $request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs('foto_siswa', $uniqueField, 'public');

            $foto = 'foto_siswa/' . $uniqueField;
        }

        $siswa->update([
            'nisn' => $request->nisn,
            'password' => $request->filled('password') ? Hash::make($request->password) : $siswa->password,
            'nama_siswa' => $request->nama_siswa,
            'foto' => $foto,
        ]);

        return redirect()->route('admin.pembimbing_siswa', $id)->with('succsess',' Data siswa berhasil diupdate');
    }

    public function delete($id, $id_siswa){

        $siswa = siswa::find($id_siswa);

        $foto = $siswa->foto;

        if ($siswa->foto) {
            if (Storage::disk('public')->exists($foto)) {
                Storage::disk('public')->delete($foto);
            }
        }

        $siswa->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus.');
    }

    public function siswaGuru($id){

        $siswas = siswa::where('id_pembimbing',$id)->get();
        $siswa = siswa::where('id_pembimbing', $id)->first();
        return view('guru.siswa', compact('siswas', 'siswa', 'id'));
    }

}
