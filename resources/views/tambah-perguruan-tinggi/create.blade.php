<!DOCTYPE html>
<html>

<head>
    <title>Tambah Perguruan Tinggi Baru</title>
</head>

<body>
    <h1>Tambah Perguruan Tinggi Baru</h1>

    <form method="POST" action="{{ route('tambah-perguruan-tinggi.store') }}">
        @csrf

        <div>
            <label for="nama_pt">Nama PT:</label>
            <input type="text" id="nama_pt" name="nama_pt" required>
        </div>

        <div>
            <label for="prodi_id">Program Studi:</label>
            <select id="prodi_id" name="prodi_id" required>
                <option value="">Pilih Program Studi</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi->id }}">{{ $prodi->nama_prodi }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>

</html>
