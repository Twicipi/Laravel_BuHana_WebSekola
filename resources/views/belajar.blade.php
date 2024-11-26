    <!DOCTYPE html>
    <html>

    <head>
        <title>Belajar Laravel</title>
        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            .alert {
                margin-top: 20px;
            }

            .table-container {
                margin: 30px auto;
                max-width: 800px;
            }

            .btn-tambah {
                margin-top: 2.3rem;
            }

            .search-container {
                margin: 20px 0;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <!-- Alert Section -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Tambah Data Button -->
            <div class="d-flex justify-content-between align-items-center">
                <!-- Search Form -->
                <form action="{{ url('/siswa') }}" method="GET" class="form-inline search-container">
                    <input type="text" name="search" class="form-control mr-sm-2"
                        placeholder="Cari nama atau jenis kelamin" value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </form>
                <a href="{{ url('/siswa/create') }}" class="btn btn-primary btn-tambah">Tambah Data</a>
            </div>

            <!-- Data Table -->
            <div class="table-container">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Golongan Darah</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($siswa->count() > 0)
                            @foreach ($siswa as $row)
                                <tr>
                                    <td>{{ isset($i) ? ++$i : ($i = 1) }}</td>
                                    <td>{{ $row->nama_lengkap }}</td>
                                    <td>{{ $row->jenkel }}</td>
                                    <td>{{ $row->goldar }}</td>
                                    <td><a href="{{ url('/siswa/edit/' . $row->id) }}">Edit</a></td>
                                    <td>
                                        <form action="{{ url('/siswa', $row->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Include Bootstrap JS (Optional) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
