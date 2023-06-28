<!DOCTYPE html>
<html>

<head>
    <title>Daftar Perguruan Tinggi</title>
</head>

<body>
    <h1>Daftar Perguruan Tinggi</h1>

    <a href="{{ route('tambah-perguruan-tinggi.create') }}">Tambah Perguruan Tinggi Baru</a>

    <table>
        <thead>
            <tr>
                <th>Nama PT</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perguruanTinggis as $perguruanTinggi)
                <tr>
                    <td>{{ $perguruanTinggi->nama_pt }}</td>
                    <td>{{ $perguruanTinggi->prodi->nama_prodi }}</td>
                    <td>
                        <a href="{{ route('tambah-perguruan-tinggi.edit', $perguruanTinggi->id) }}">Edit</a>
                        <form action="{{ route('tambah-perguruan-tinggi.destroy', $perguruanTinggi->id) }}"
                            method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
