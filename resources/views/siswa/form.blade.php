@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Perhatian</strong>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<h1>Form Siswa</h1>

<form action="{{ url('siswa', @$siswa->id) }}" method="POST">
    @csrf

    @if (!empty(@$siswa))
        @method('PATCH')
    @endif

    <div>
        <label for="nis">NIS:</label>
        <input type="text" id="nis" name="nis" value="{{ old('nis', @$siswa->nis) }}">
    </div>

    <div>
        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', @$siswa->nama_lengkap) }}">
    </div>

    <div>
        <label>Jenis Kelamin:</label><br>
        <label>
            <input type="radio" name="jenkel" value="L" {{ old('jenkel', @$siswa->jenkel) == 'L' ? 'checked' : '' }}> L
        </label>
        <label>
            <input type="radio" name="jenkel" value="P" {{ old('jenkel', @$siswa->jenkel) == 'P' ? 'checked' : '' }}> P
        </label>
    </div>

    <div>
        <label for="goldar">Golongan Darah:</label>
        <select id="goldar" name="goldar">
            <option value="">- Pilih -</option>
            <option value="A" {{ old('goldar', @$siswa->goldar) == 'A' ? 'selected' : '' }}>A</option>
            <option value="B" {{ old('goldar', @$siswa->goldar) == 'B' ? 'selected' : '' }}>B</option>
            <option value="AB" {{ old('goldar', @$siswa->goldar) == 'AB' ? 'selected' : '' }}>AB</option>
            <option value="O" {{ old('goldar', @$siswa->goldar) == 'O' ? 'selected' : '' }}>O</option>
        </select>
    </div>

    <div>
        <button type="submit">Simpan</button>
    </div>
</form>


@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif
