<div class="sidebar">
    <h1>
        Opat Bandung
    </h1>
    <ul>
        <li><a href="{{ route('guru.index') }}">Data Guru</a></li>
        <li><a href="{{ route('siswa.index') }}">Data Siswa</a></li>
        <li><a href="{{ route('kelas.index') }}">Data Kelas</a></li>
    </ul>
</div>

<style>
    .sidebar {
            width: 190px;
            background-color: #007bff;
            color: white;
            height: 100vh;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #0056b3;
        }
</style>
