<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Tempat;
use App\Models\User;

class TempatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $tempat = Tempat::user($user)->paginate(10);

        return view('tempat.index', compact('user', 'tempat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('tempat.add', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'         => 'required',
            'date'         => 'required',
        ]);

        $tempat = new Tempat;
        $tempat->name = $request->name;
        $tempat->date = $request->date;
        $tempat->penjaga_id = $user->userable->id;
        $tempat->save();

        session()->flash('success', 'Sukses Tambah Data Penjagaan ' . $tempat->name);
        return redirect()->route('tempat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tempat = Tempat::findOrFail($id);

        return view('tempat.edit', compact('tempat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required',
            'date'         => 'required',
        ]);

        $tempat = Tempat::findOrFail($id);
        $tempat->name = $request->name;
        $tempat->date = $request->date;
        $tempat->save();

        session()->flash('success', 'Sukses Ubah Data Penjagaan ' . $tempat->name);
        return redirect()->route('tempat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tempat = Tempat::findOrFail($id);
        $tempat->delete();

        session()->flash('success', 'Sukses Hapus Penjagaan!');
        return redirect()->route('tempat.index');
    }
}
