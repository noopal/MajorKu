<!DOCTYPE html>
<html>

<head>
    <title>Edit Perguruan Tinggi</title>
</head>

<body>
    <h1>Edit Perguruan Tinggi</h1>

    <form method="POST" action="{{ route('tambah-perguruan-tinggi.update', $perguruanTinggi->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_pt">Nama PT:</label>
            <input type="text" id="nama_pt" name="nama_pt" value="{{ $perguruanTinggi->nama_pt }}" required>
        </div>

        <div>
            <label for="prodi_id">Program Studi:</label>
            <select id="prodi_id" name="prodi_id" required>
                <option value="">Pilih Program Studi</option>
                @foreach ($prodis as $prodi)
                    <option value="{{ $prodi->id }}"
                        {{ $prodi->id == $perguruanTinggi->prodi_id ? 'selected' : '' }}>
                        {{ $prodi->nama_prodi }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Update</button>
    </form>
</body>

</html>
