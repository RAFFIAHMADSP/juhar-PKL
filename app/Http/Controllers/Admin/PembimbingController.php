<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\dudi;
use App\Models\Admin\guru;
use App\Models\admin\pembimbing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembimbingController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function pembimbing()
    {

        $pembimbings = pembimbing::with('guru', 'dudi')->get();
        return view('admin.pembimbing',compact('pembimbings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $gurus = guru::all();
        $dudis = dudi::all();

        return view('admin.tambah_pembimbing', compact('gurus', 'dudis') );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_guru' => 'required',
            'id_dudi' => 'required',
        ]);

        pembimbing::create([
           'id_guru' => $request->id_guru,
           'id_dudi' => $request->id_dudi,
        ]);

        return redirect()->route('admin.pembimbing')->with('success', 'Data pembimbing berhasil ditamabah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pembimbing = pembimbing::find($id);

        $gurus = guru::with('pembimbingGuru')->get();
        $dudis = dudi::with('pembimbingDudi')->get();

        return view('admin.edit_pembimbing', compact('pembimbing', 'gurus', 'dudis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembimbing = pembimbing::find($id);

        $request->validate([
            'id_guru' => 'required',
            'id_dudi' => 'required',
        ]);

        $pembimbing->update([
           'id_guru' => $request->id_guru,
           'id_dudi' => $request->id_dudi,
        ]);

        return redirect()->route('admin.pembimbing')->with('success', 'Data pembimbing berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function delete($id){

        $pembimbing = pembimbing::find($id);

        $pembimbing->delete();

        return redirect()->back()->with('success', 'Data pembimbing berhasil dihapus.');

    }

    public function pembimbingGuru(){

        $id_guru= Auth::guard('guru')->user()->id_guru;
        $pembimbings = pembimbing::where('id_guru', $id_guru)->get();

        return view('guru.pembimbing_guru', compact('pembimbings'));
    }



}
