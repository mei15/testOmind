<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penjaga;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PenjagaController extends Controller
{
    public function index(Request $request)
    {
        $penjaga = Penjaga::all();
        return view('penjaga.index', compact('penjaga'));
    }

    public function create()
    {
        return view('penjaga.add');
    }

    public function edit($id)
    {
        $penjaga = Penjaga::findOrFail($id);
        $user = User::where([
            'userable_type' => Penjaga::class,
            'userable_id' => $penjaga->id
        ])->first();

        return view('penjaga.edit', compact('penjaga', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'email'         => 'required',
        ]);

        // Make transaction, biar pasti keinsert dua2 nya query
        DB::beginTransaction();

        try {
            $penjaga = Penjaga::find($id);
            $penjaga->name = $request->name;
            
            $penjaga->save();

            $user = User::where([
                'userable_type' => Penjaga::class,
                'userable_id' => $penjaga->id
            ])->first();

            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->save();

            // commit biar perubahan di DB nya kesave
            DB::commit();
        } catch (\Exception $err) {
            // rollback DB nya, datanya gajadi diinput
            DB::rollBack();

            session()->flash('error', 'Terjadi kesalahan!');
            return redirect()->route('penjaga.index');
        }

        session()->flash('success', 'Sukses Ubah Data Penjaga ' . $penjaga->name);
        return redirect()->route('penjaga.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'email'         => 'required',
        ]);

        // Make transaction, biar pasti keinsert dua2 nya query
        DB::beginTransaction();

        try {
            $penjaga = new Penjaga;
            $penjaga->name = $request->name;
           
            $penjaga->save();

            $user = new User;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->userable_type = Penjaga::class;
            $user->userable_id = $penjaga->id;
            $user->remember_token = Str::random(40);
            $user->email_verified_at = Carbon::now();
            $user->save();

            // commit biar perubahan di DB nya kesave
            DB::commit();
        } catch (\Exception $err) {
            // rollback DB nya, datanya gajadi diinput
            DB::rollBack();

            session()->flash('error', 'Terjadi kesalahan!');
            return redirect()->route('penjaga.index');
        }

        session()->flash('success', 'Sukses Tambah Data Penjaga ' . $penjaga->name);
        return redirect()->route('penjaga.index');
    }

    public function destroy($id)
    {
        $penjaga = Penjaga::find($id);
        $user = User::where([
            'userable_type' => Penjaga::class,
            'userable_id' => $penjaga->id
        ])->first();
        $penjaga->delete();
        $user->delete();
        return redirect()->route('penjaga.index')->with('success', 'Data Penjaga Berhasil Dihapus !');
    }
}
