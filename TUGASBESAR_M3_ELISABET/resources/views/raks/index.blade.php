<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Zonasi dan Rak Gudang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f2f2f2; display: flex; flex-direction: column; align-items: center; }
        h1 { color: rgb(90, 0, 0); text-align: center; }
        table { border-collapse: collapse; background: white; width: 800px; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: rgb(90, 0, 0); color: white; }
        button { padding: 6px 12px; background-color: rgb(90, 0, 0); color: white; border: none; cursor: pointer; }
        .btn-tambah { margin-bottom: 15px; padding: 10px 20px; background-color: rgb(90, 0, 0); color: white; text-decoration: none; display: inline-block; }
        .alert { color: green; margin-bottom: 15px; font-weight: bold; }
    </style>
</head>
<body>

    <h1>Data Zonasi dan Rak Gudang</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <div>
        <a href="{{ route('raks.create') }}" class="btn-tambah">+ Tambah Rak</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Gudang</th>
                <th>Nama Zona</th>
                <th>Nomor Lorong</th>
                <th>Nomor Rak</th>
                <th>Kapasitas Rak (kg)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($raks as $index => $rak)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $rak->namaGudang }}</td>
                <td>{{ ucfirst($rak->namaZona) }}</td>
                <td>{{ $rak->nomorLorong }}</td>
                <td>{{ $rak->nomorRak }}</td>
                <td>{{ $rak->kapasitas }} kg</td>
                <td>
                    <a href="{{ route('raks.edit', $rak->id) }}"><button type="button">Edit</button></a>
                    
                    <form action="{{ route('raks.destroy', $rak->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">Belum ada data rak gudang.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>