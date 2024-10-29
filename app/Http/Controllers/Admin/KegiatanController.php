<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kegiatan;
use App\Models\admin\pembimbing;
use App\Models\admin\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    public function kegiatan($id, $id_siswa){

        $loginGuru = Auth::guard('guru')->user()->id_guru;

        $siswa = siswa::find($id_siswa);

        if (!$siswa || !$siswa->id_pembimbing){
            return back()->withErrors(['access' => 'Siswa tidak ditemukan atau tidak memiliki pembimbing.']);
        }

        if ($siswa->id_pembimbing != $id) {
            return back()->withErrors(['access' => 'Pembimbing tidak sesuai.']);
        }

        $pembimbing = pembimbing::find($id);

        if (!$pembimbing || $pembimbing->id_guru !== $loginGuru){
            return back()->withErrors(['access' => 'access anda ditolak, siswa ini tidak dibimbimbing oleh anda.']);
        }



        $kegiatans = Kegiatan::where('id_siswa', $id_siswa)->get();
        $kegiatan = Kegiatan::where('id_siswa', $id_siswa)->first();
        $id_pembimbing = $id;
        return view('guru.kegiatan', compact('kegiatans', 'kegiatan', 'id_pembimbing'));
    }

    public function detailKegiatan($id, $id_siswa, $id_kegiatan) {

        $loginGuru = Auth::guard('guru')->user()->id_guru;

        $siswa = siswa::find($id_siswa);

        if (!$siswa || !$siswa->id_pembimbing){
            return back()->withErrors(['access' => 'Siswa tidak ditemukan atau tidak memiliki pembimbing.']);
        }

        if ($siswa->id_pembimbing != $id) {
            return back()->withErrors(['access' => 'Pembimbing tidak sesuai.']);
        }

        $pembimbing = pembimbing::find($id);

        if (!$pembimbing || $pembimbing->id_guru !== $loginGuru){
            return back()->withErrors(['access' => 'access anda ditolak, siswa ini tidak dibimbimbing oleh anda.']);
        }


        $kegiatan = kegiatan::where('id_kegiatan', $id_kegiatan)->get();
        $kegiatan = kegiatan::where('id_kegiatan', $id_kegiatan)->first();

        $kegiatan = kegiatan::where('id_kegiatan', $id_kegiatan)
                                ->where('id_siswa', $id_siswa)
                                ->first();

        if(!$kegiatan) {
            return back()->withErrors(['access', 'kegiatan tidak tersedia']);
        }

        return view('guru.detail_kegiatan', compact('id', 'kegiatan'));
    }

        public function kegiatanSiswa(){

            $id_siswa = Auth::guard('siswa')->user()->id_siswa;
            $kegiatans = Kegiatan::where('id_siswa', $id_siswa)->get();

            return view('siswa.kegiatan', compact('kegiatans'));

        }

        public function kegiatanSiswaTambah() {

            $id_siswa = Auth::guard('siswa')->user()->id_siswa;
            $kegiatans = Kegiatan::where('id_siswa', $id_siswa)->get();

            return view('siswa.kegiatan_tambah', compact('kegiatans'));
        }

        public function kegiatanSiswaStore(Request $request)
    {
        $id_siswa = Auth::guard('siswa')->user()->id_siswa;

        $request->validate([
            'nama_kegiatan' => 'required',
            'ringkasan_kegiatan' => 'required',
            'waktu' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $uniqueField = uniqid() .'_'.$request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs('foto_kegiatan',$uniqueField, 'public');

            $foto = 'foto_kegiatan/' . $uniqueField;
        }

       kegiatan::create([
            'id_siswa' => $id_siswa,
            'nama_kegiatan' => $request->nama_kegiatan,
            'ringkasan_kegiatan' => $request->ringkasan_kegiatan,
            'waktu' => $request->waktu,
            'foto' => $foto,

        ]);

        return redirect()->route('siswa.kegiatan')->with('succses', 'Data kegiatan berhasil di tambah ');
    }

    public function kegiatanSiswaEdit(string $id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('siswa.kegiatan_edit', compact('kegiatan'));
    }

    public function kegiatanSiswaUpdate(Request $request, string $id)
    {
        $kegiatan = Kegiatan::find($id);

        $request->validate([
            'nama_kegiatan' => 'required',
            'ringkasan_kegiatan' => 'required',
            'waktu' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $foto = $kegiatan->foto;

        if ($request->hasFile('foto')) {
            if ($foto) {
                Storage::disk('public')->delete('$foto');
            }
            $uniqueField = uniqid() . '_' . $request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs('foto_kegiatan', $uniqueField, 'public');

            $foto = 'foto_kegiatan/' . $uniqueField;
        }

        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'ringkasan_kegiatan' => $request->ringkasan_kegiatan,
            'waktu' => $request->waktu,
            'foto' => $foto,

        ]);

        return redirect()->route('siswa.kegiatan')->with('success',' Data kegiatan berhasil diupdate');
    }

    public function kegiatanSiswaDelete($id){

        $kegiatan = kegiatan::find($id);

        $foto = $kegiatan->foto;

        if ($kegiatan->foto) {
            if (Storage::disk('public')->exists($foto)) {
                Storage::disk('public')->delete($foto);
            }
        }
        $kegiatan->delete();

        return redirect()->back()->with('success', 'Data kegiatan berhasil dihapus.');
    }

    public function kegiatanSiswaDetail($id_kegiatan) {

        $id_siswa = Auth::guard('siswa')->user()->id_siswa;
        $kegiatan = kegiatan::where('id_kegiatan', $id_kegiatan)
                                ->where('id_siswa', $id_siswa)
                                ->first();

        if(!$kegiatan) {
            return back()->withErrors(['access', 'kegiatan tidak tersedia']);
        }

        return view('siswa.detail_kegiatan', compact('kegiatan'));
    }



}
