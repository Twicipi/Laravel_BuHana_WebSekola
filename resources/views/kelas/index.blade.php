<!DOCTYPE html>
<html>

<head>
    <title>Daftar Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            /* Hilangkan padding body */
            display: flex;
            /* Gunakan flex untuk tata letak */
        }

        .container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-left: 220px;
            width: calc(100% - 100px);
            /* Sesuaikan lebar konten dengan sisa ruang */
            box-sizing: border-box;
            /* Sertakan padding dalam perhitungan lebar */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .btn {
            text-decoration: none;
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            border-radius: 3px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table thead {
            background-color: #f8f9fa;
        }

        .alert {
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            margin-bottom: 15px;
            border-radius: 3px;
            animation: fadeIn 0.5s;
        }

        .action-btn {
            display: inline-block;
            margin-right: 5px;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }

        .edit-btn {
            background-color: #ffc107;
            color: white;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            cursor: pointer;
        }

        .search-container {
            margin-bottom: 20px;
        }

        .search-container form {
            display: flex;
        }

        .search-container input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-right: 5px;
            flex-grow: 1;
        }

        .search-container button {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    @include('components.sidebar')
    <div class="container">
        <div class="header">
            <h1>Daftar Kelas</h1>
            <a href="{{ route('kelas.create') }}" class="btn">Tambah Kelas</a>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="search-container">
            <form action="{{ route('kelas.index') }}" method="GET">
                <input type="text" name="search" placeholder="Cari kelas..." value="{{ request()->query('search') }}">
                <button type="submit">Cari</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi Ruangan</th>
                    <th>Nama Kelas</th>
                    <th>Jurusan</th>
                    <th>Nama Wali Kelas</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row->lokasi_ruangan }}</td>
                        <td>{{ $row->kelas }}</td>
                        <td>{{ $row->jurusan }}</td>
                        <td>{{ $row->nama_wali_kelas }}</td>
                        <td>
                            <a href="{{ route('kelas.edit', $row->id) }}" class="action-btn edit-btn">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('kelas.destroy', $row->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
