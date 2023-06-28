<!DOCTYPE html>
<html>

<head>
    <title>Edit Prodi</title>
</head>

<body>
    <h1>Edit Prodi</h1>

    <form method="POST" action="{{ route('prodi.update', $prodi->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_prodi">Nama Prodi:</label>
            <input type="text" id="nama_prodi" name="nama_prodi" value="{{ $prodi->nama_prodi }}" required>
        </div>

        <div>
            <label for="keterangan">Keterangan:</label>
            <textarea id="keterangan" name="keterangan">{{ $prodi->keterangan }}</textarea>
        </div>

        <div>
            <label for="jurusan_id">Jurusan:</label>
            <select id="jurusan_id" name="jurusan_id" required>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}" {{ $prodi->jurusan_id == $jurusan->id ? 'selected' : '' }}>
                        {{ $jurusan->namaJurusan }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
