
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <div x-data="{ showForm: true }" class="bg-white shadow-lg rounded-lg p-8 transform transition-all duration-300"
             :class="{'scale-95 opacity-75': !showForm}">
            <h2 class="text-2xl font-bold text-center text-green-600 mb-6 animate-fade-in">
                Tambah Data Kelas
            </h2>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 animate-shake" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kelas.store') }}" method="POST"
                  x-show="showForm"
                  x-transition:enter="transition ease-out duration-300"
                  x-transition:enter-start="opacity-0 scale-90"
                  x-transition:enter-end="opacity-100 scale-100">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Lokasi Ruangan</label>
                    <input type="text" name="lokasi_ruangan"
                           value="{{ old('lokasi_ruangan') }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Kelas</label>
                    <input type="text" name="kelas"
                           value="{{ old('kelas') }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Jurusan</label>
                    <input type="text" name="jurusan"
                           value="{{ old('jurusan') }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Wali Kelas</label>
                    <input type="text" name="nama_wali_kelas"
                           value="{{ old('nama_wali_kelas') }}"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-300 transform hover:scale-105">
                        Simpan
                    </button>
                    <a href="{{ route('kelas.index') }}"
                       class="inline-block align-baseline font-bold text-sm text-green-500 hover:text-green-800 transition duration-300">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <style>
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .animate-shake { animation: shake 0.5s; }
        .animate-fade-in { animation: fadeIn 0.7s ease-out; }
    </style>
</body>
</html>
