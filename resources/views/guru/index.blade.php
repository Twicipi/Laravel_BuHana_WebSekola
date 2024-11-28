<!DOCTYPE html>
<html>

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
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
            <h1>Data Guru</h1>
            <a href="{{ route('guru.create') }}" class="btn"><i class="fas fa-plus"></i> Tambah Guru</a>
        </div>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <form action="{{ route('guru.index') }}" method="GET" style="margin-bottom: 20px;">
            <input type="text" name="search" value="{{ old('search', $search) }}"
                placeholder="Cari berdasarkan NIP atau Nama Guru"
                style="padding: 8px; border: 1px solid #ddd; border-radius: 3px; width: 250px;">
            <button type="submit" class="btn" style="background-color: #007bff;">Cari</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $item)
                    <tr>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->nama_guru }}</td>
                        <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                            <a href="{{ route('guru.edit', $item->id) }}" class="action-btn edit-btn">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('guru.destroy', $item->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn delete-btn"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
