<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }
        .form-container {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 30px;
            width: 400px;
            animation: slideIn 0.5s;
        }
        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .radio-group {
            display: flex;
            gap: 15px;
        }
        .radio-group label {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 3px;
            margin-bottom: 15px;
        }
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>{{ isset($guru) ? 'Edit' : 'Tambah' }} Guru</h1>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ isset($guru) ? route('guru.update', $guru->id) : route('guru.store') }}" method="POST">
            @csrf
            @if (isset($guru))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="nip">NIP:</label>
                <input type="text" name="nip" value="{{ old('nip', $guru->nip ?? '') }}">
            </div>

            <div class="form-group">
                <label for="nama_guru">Nama Guru:</label>
                <input type="text" name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru ?? '') }}">
            </div>

            <div class="form-group">
                <label>Jenis Kelamin:</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="jenis_kelamin" value="L"
                            {{ old('jenis_kelamin', $guru->jenis_kelamin ?? '') == 'L' ? 'checked' : '' }}> Laki-laki
                    </label>
                    <label>
                        <input type="radio" name="jenis_kelamin" value="P"
                            {{ old('jenis_kelamin', $guru->jenis_kelamin ?? '') == 'P' ? 'checked' : '' }}> Perempuan
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat">{{ old('alamat', $guru->alamat ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn">Simpan</button>
        </form>
    </div>
</body>
</html>
