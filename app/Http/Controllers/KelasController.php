<?php

namespace App\Http\Controllers;

use App\Models\Kelas; // Menggunakan model Kelas untuk query ke database
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $query = Kelas::query();

        // Check if there's a search query
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('lokasi_ruangan', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%')
                ->orWhere('jurusan', 'like', '%' . $search . '%')
                ->orWhere('nama_wali_kelas', 'like', '%' . $search . '%');
        }

        $kelas = $query->get();


        return view('kelas.index', compact('kelas'));
    }



    public function create()
    {
        // Menampilkan form untuk membuat data kelas
        return view('kelas.create');
    }

    public function store(Request $request)
    {
        // Aturan validasi
        $rules = [
            'lokasi_ruangan' => [
                'required',
                'regex:/^[A-Z0-9\s\.-]+$/',
                'min:3',
                'unique:t_kelas,lokasi_ruangan'
            ],
            'kelas' => [
                'required',
                'regex:/^[A-Z0-9\s-]+$/',
                'unique:t_kelas,kelas'
            ],
            'jurusan' => [
                'required',
                'regex:/^[A-Za-z0-9\s]+$/',
                'min:3'
            ],
            'nama_wali_kelas' => [
                'required',
                'regex:/^[a-zA-Z\s\.]+$/',
                'min:5',
                'not_regex:/\s{2,}/',
            ],
        ];

        // Pesan validasi
        $messages = [
            'lokasi_ruangan.required' => 'Lokasi ruangan harus diisi',
            'lokasi_ruangan.regex' => 'Format lokasi ruangan tidak valid (gunakan huruf kapital, angka, spasi, atau strip)',
            'lokasi_ruangan.min' => 'Lokasi ruangan minimal 3 karakter',
            'lokasi_ruangan.unique' => 'Lokasi ruangan sudah digunakan',

            'kelas.required' => 'Nama kelas harus diisi',
            'kelas.regex' => 'Format nama kelas tidak valid (gunakan huruf kapital, angka, spasi, atau strip)',
            'kelas.unique' => 'Nama kelas sudah digunakan',

            'jurusan.required' => 'Jurusan harus diisi',
            'jurusan.regex' => 'Format jurusan tidak valid (gunakan huruf, angka, dan spasi)',
            'jurusan.min' => 'Jurusan minimal 3 karakter',

            'nama_wali_kelas.required' => 'Nama wali kelas harus diisi',
            'nama_wali_kelas.regex' => 'Nama wali kelas hanya boleh berisi huruf, spasi, dan titik',
            'nama_wali_kelas.min' => 'Nama wali kelas minimal 5 karakter',
            'nama_wali_kelas.not_regex' => 'Nama wali kelas tidak boleh mengandung spasi ganda',
        ];

        // Validasi input
        $validated = $request->validate($rules, $messages);

        // Simpan data ke database
        Kelas::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function edit($id)
    {
        // Find the kelas by ID
        $kelas = Kelas::findOrFail($id);

        // Return the edit view with the kelas data
        return view('kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $rules = [
            'lokasi_ruangan' => [
                'required',
                'regex:/^[A-Z0-9\s\.-]+$/',
                'min:3',
                'unique:t_kelas,lokasi_ruangan,' . $id
            ],
            'kelas' => [
                'required',
                'regex:/^[A-Z0-9\s-]+$/',
                'unique:t_kelas,kelas,' . $id
            ],
            'jurusan' => [
                'required',
                'regex:/^[A-Za-z0-9\s]+$/',
                'min:3'
            ],
            'nama_wali_kelas' => [
                'required',
                'regex:/^[a-zA-Z\s\.]+$/',
                'min:5',
                'not_regex:/\s{2,}/',
            ],
        ];


        $validated = $request->validate($rules);
        $kelas = Kelas::findOrFail($id);
        $kelas->update($validated);
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diubah');
    }

    public function destroy($id)
    {
        // Find the kelas and delete
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        // Redirect with success message
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus');
    }
}
