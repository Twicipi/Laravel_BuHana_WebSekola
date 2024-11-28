<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $guru = Guru::where('nip', 'like', "%$search%")
                ->orWhere('nama_guru', 'like', "%$search%")
                ->get();
        } else {
            $guru = Guru::all();
        }

        return view('guru.index', compact('guru', 'search'));
    }

    public function create()
    {
        return view('guru.form');
    }

    public function store(Request $request)
    {
        $rules = [
            'nip' => 'required|unique:t_guru,nip|numeric',
            'nama_guru' => 'required|regex:/^[a-zA-Z\s]+$/',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required'
        ];

        $request->validate($rules);

        Guru::create($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil disimpan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.form', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nip' => "required|unique:t_guru,nip,$id|numeric",
            'nama_guru' => 'required|regex:/^[a-zA-Z\s]+$/',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required'
        ];

        $request->validate($rules);

        $guru = Guru::findOrFail($id);
        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diubah');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus');
    }
}
