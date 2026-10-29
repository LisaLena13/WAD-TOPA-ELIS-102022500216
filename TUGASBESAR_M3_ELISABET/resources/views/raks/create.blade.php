<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Rak Gudang</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f2f2f2; display: flex; flex-direction: column; align-items: center; }
        h1 { color: rgb(90, 0, 0); }
        form { background-color: white; padding: 20px; width: 400px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select { width: 100%; padding: 10px; margin-top: 5px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; background-color: rgb(90, 0, 0); color: white; border: none; cursor: pointer; width: 100%; }
        .back { display: block; text-align: center; margin-top: 10px; color: rgb(90, 0, 0); text-decoration: none; }
    </style>
</head>
<body>

    <h1>Tambah Rak Baru</h1>

    <form action="{{ route('raks.store') }}" method="post">
        @csrf
        <label for="namaGudang">Nama Gudang</label>
        <input type="text" id="namaGudang" name="namaGudang" required>

        <label for="namaZona">Nama Zona</label>
        <select id="namaZona" name="namaZona" required>
            <option value="">Pilih Zona</option>
            <option value="penerimaan">Zona Penerimaan</option>
            <option value="penyimpanan">Zona Penyimpanan</option>
            <option value="pengambilan">Zona Pengambilan</option>
            <option value="pengiriman">Zona Pengiriman</option>
        </select>

        <label for="nomorLorong">Nomor Lorong</label>
        <input type="text" id="nomorLorong" name="nomorLorong" required>

        <label for="nomorRak">Nomor Rak</label>
        <input type="text" id="nomorRak" name="nomorRak" required>

        <label for="kapasitas">Kapasitas Rak (kg)</label>
        <input type="number" id="kapasitas" name="kapasitas" min="1" required>

        <button type="submit">Simpan</button>
        <a href="{{ route('raks.index') }}" class="back">Kembali</a>
    </form>

</body>
</html>