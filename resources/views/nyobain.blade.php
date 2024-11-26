<!DOCTYPE html>
<html>

<head>
    <title>Belajar Laravel</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>No</th>
            <th>LOKASI RUANGAN</th>
            <th>NAMA KELAS</th>
            <th>Nama Wali Kelas</th>
        </tr>
        @foreach ($kelas as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td> <!-- Menampilkan nomor urut -->
                <td>{{ $row->lokasi_ruangan }}</td>
                <td>{{ $row->kelas }}</td>
                <td>{{ $row->nama_wali_kelas }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
