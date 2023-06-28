<!DOCTYPE html>
<html>

<head>
    <title>Daftar Prodi</title>
</head>

<body>
    <h1>Daftar Prodi</h1>

    <a href="{{ route('prodi.create') }}">Tambah Prodi Baru</a>

    <table>
        <thead>
            <tr>
                <th>Nama Prodi</th>
                <th>Keterangan</th>
                <th>Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prodis as $prodi)
                <tr>
                    <td>{{ $prodi->nama_prodi }}</td>
                    <td>{{ $prodi->keterangan }}</td>
                    <td>{{ $prodi->jurusan->nama_jurusan }}</td>
                    <td>
                        <a href="{{ route('prodi.edit', $prodi->id) }}">Edit</a>
                        <form action="{{ route('prodi.destroy', $prodi->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus prodi ini?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
