<?php
session_start();

if (!isset($_SESSION['rak'])) {
    $_SESSION['rak'] = [];
}

if (isset($_POST['simpan'])) {

    $data = [
        'namaGudang' => $_POST['namaGudang'],
        'namaZona' => $_POST['namaZona'],
        'nomorLorong' => $_POST['nomorLorong'],
        'nomorRak' => $_POST['nomorRak'],
        'kapasitas' => $_POST['kapasitas']
    ];

    $_SESSION['rak'][] = $data;

    header("Location: index.php");
    exit;
}   
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Zonasi dan Rak Gudang</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Data Zonasi dan Rak Gudang</h1>

    <form action="" method="post">

        <label for="namaGudang">Nama Gudang</label>
        <input type="text" id="namaGudang" name="namaGudang">

        <label for="namaZona">Nama Zona</label>
        <select id="namaZona" name="namaZona">
            <option value="">Pilih Zona</option>
            <option value="penerimaan">Zona Penerimaan</option>
            <option value="penyimpanan">Zona Penyimpanan</option>
            <option value="pengambilan">Zona Pengambilan</option>
            <option value="pengiriman">Zona Pengiriman</option>
        </select>

        <label for="nomorLorong">Nomor Lorong</label>
        <input type="text" id="nomorLorong" name="nomorLorong">

        <label for="nomorRak">Nomor Rak</label>
        <input type="text" id="nomorRak" name="nomorRak">

        <label for="kapasitas">Kapasitas Rak (kg)</label>
        <input type="number" id="kapasitas" name="kapasitas" min="1">

        <button type="submit" name="simpan">Simpan</button>

    </form>

</body>
</html>