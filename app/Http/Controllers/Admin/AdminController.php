<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {

        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function profile(){
        $profile = Auth::guard('admin')->user();
        return view('admin.profile', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id_admin = Auth::guard('admin')->user()->id_admin;
        $admin = admin::find($id_admin);

        $request->validate([
            'username' => 'required|unique:admin,username,'. $id_admin . ',id_admin',
            'password' => 'nullable|min:8',
            "nama_admin" => 'required',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $uniqueField = uniqid() .'_'.$request->file('foto')->getClientOriginalName();

            $request->file('foto')->storeAs('foto_admin',$uniqueField, 'public');

            $foto = 'foto_admin/' . $uniqueField;
        }

        $admin->update([
            'username' => $request->username,
            'password' => $request->filled('password') ? Hash::make($request->password) : $admin->password,
            'nama_admin' => $request->nama_admin,
            'foto' => $foto,
        ]);


        return redirect()->route('admin.profile')->with('success', 'profile berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
