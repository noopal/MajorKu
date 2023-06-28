<!DOCTYPE html>
<html>

<head>
    <title>Tambah Prodi Baru</title>
</head>

<body>
    <h1>Tambah Prodi Baru</h1>

    <form method="POST" action="{{ route('prodi.store') }}">
        @csrf

        <div>
            <label for="nama_prodi">Nama Prodi:</label>
            <input type="text" id="nama_prodi" name="nama_prodi" required>
        </div>

        <div>
            <label for="keterangan">Keterangan:</label>
            <textarea id="keterangan" name="keterangan"></textarea>
        </div>

        <div>
            <label for="jurusan_id">Jurusan:</label>
            <select id="jurusan_id" name="jurusan_id" required>
                <option value="">Pilih Jurusan</option>
                @foreach ($jurusans as $jurusan)
                    <option value="{{ $jurusan->id }}">{{ $jurusan->namaJurusan }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
