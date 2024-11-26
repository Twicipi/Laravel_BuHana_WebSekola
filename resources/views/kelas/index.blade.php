<!DOCTYPE html>
<html>

<head>
    <title>Daftar Kelas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 6px 12px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #d32f2f;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            padding: 6px 12px;
            border: 1px solid #4CAF50;
            border-radius: 4px;
            margin-right: 10px;
        }

        a:hover {
            background-color: #4CAF50;
            color: white;
        }

        .success-message {
            color: green;
            background-color: #e8f5e9;
            border: 1px solid #c8e6c9;
            padding: 10px;
            margin-bottom: 20px;
        }

        .search-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .search-container input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a,
        .pagination span {
            padding: 8px 12px;
            margin: 0 4px;
            border-radius: 4px;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
        }

        .pagination a:hover {
            background-color: #4CAF50;
            color: white;
        }

        .pagination .active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Daftar Kelas</h2>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="search-container">
            <form action="{{ route('kelas.index') }}" method="GET">
                <input type="text" name="search" placeholder="Cari kelas..." value="{{ request()->query('search') }}">
                <button type="submit">Cari</button>
            </form>
        </div>

        <a href="{{ route('kelas.create') }}">Tambah Kelas Baru</a>

        <table>
            <tr>
                <th>No</th>
                <th>LOKASI RUANGAN</th>
                <th>NAMA KELAS</th>
                <th>JURUSAN</th>
                <th>Nama Wali Kelas</th>
                <th>Aksi</th>
            </tr>
            @foreach ($kelas as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $row->lokasi_ruangan }}</td>
                    <td>{{ $row->kelas }}</td>
                    <td>{{ $row->jurusan }}</td>
                    <td>{{ $row->nama_wali_kelas }}</td>
                    <td>
                        <a href="{{ route('kelas.edit', $row->id) }}">Edit</a>
                        <form action="{{ route('kelas.destroy', $row->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
</body>
</html>
