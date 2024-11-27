<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input 'search' dari form

        // Query dengan kondisi pencarian jika 'search' tidak kosong
        $data['siswa'] = \App\Models\Siswa::orderBy('jenkel')
            ->when($search, function ($query, $search) {
                return $query->where('nama_lengkap', 'LIKE', "%$search%")
                    ->orWhere('jenkel', 'LIKE', "%$search%");
            })
            ->orderBy('jenkel') // Tetap mengurutkan berdasarkan 'jenkel'
            ->get();

        return view('belajar', $data);
    }

    public function kelas()
    {
        // Mengambil data kelas dari tabel 't_kelas', diurutkan berdasarkan kolom 'kelas'
        $kelas = DB::table('t_kelas')
            ->orderBy('kelas', 'asc')
            ->get();

        // Mengirim data kelas ke view 'nyobain'
        return view('nyobain', compact('kelas'));
    }

    public function learning()
    {
        $data['nama'] = "learning endpoint";
        $data['jk'] = "Perempuan";
        return view('learning', $data);
    }
    public function create()
    {
        return view('siswa.form');
    }
    public function store(Request $request)
    {
        $rule = [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|regex:/^[a-zA-Z\s]+$/',
            'jenkel' => 'required',
            'goldar' => 'required',
        ];

        $request->validate($rule);


        try {
            $input = $request->except('_token');
            // $status = \App\Models\Siswa::create($input);
            $siswa = new \App\Models\Siswa;
            $siswa->nis = $input['nis'];
            $siswa->nama_lengkap = $input['nama_lengkap'];
            $siswa->jenkel = $input['jenkel'];
            $siswa->goldar = $input['goldar'];
            $status = $siswa->save();



            if ($status) {
                return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan');
            } else {
                return redirect()->route('siswa.create')->withInput()->with('error', 'Data siswa gagal disimpan');
            }
        } catch (\Exception $e) {
            return redirect()->route('siswa.create')
                ->withInput() // Tambahkan ini
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    function edit(Request $request, $id)
    {
        $siswa = DB::table('t_siswa')->find($id);
        return view('siswa.form', compact('siswa'));
    }

    function update(Request $request, $id)
    {
        $rule = [
            'nis' => 'required|numeric',
            'nama_lengkap' => 'required|regex:/^[a-zA-Z\s]+$/',
            'jenkel' => 'required',
            'goldar' => 'required',
        ];
        $request->validate($rule);

        $input = $request->all();
        $siswa = \App\Models\Siswa::find($id);
       // $siswa = new \App\Models\Siswa;
        $siswa->nis = $input['nis'];
        $siswa->nama_lengkap = $input['nama_lengkap'];
        $siswa->jenkel = $input['jenkel'];
        $siswa->goldar = $input['goldar'];
        $status = $siswa->update();

        if ($status) {
            return redirect('/siswa')->with('success', 'Data siswa berhasil diubah');
        } else {
            return redirect("/siswa/edit/{$id}")->with('error', 'Data siswa gagal diubah');
        }
    }

    function destroy($id)
    {
        $siswa = \App\Models\Siswa::find($id);
        $status = $siswa->delete();
        if ($status) {
            return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus');
        } else {
            return redirect('/siswa')->with('error', 'Data siswa gagal dihapus');
        }
    }
}
