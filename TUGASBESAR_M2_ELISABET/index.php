<?php
session_start();

if (!isset($_SESSION['rak'])) {
    $_SESSION['rak'] = [];
}

/* Proses update */
if (isset($_POST['update'])) {

    $id = $_POST['id'];

    $_SESSION['rak'][$id]['namaGudang'] = $_POST['namaGudang'];
    $_SESSION['rak'][$id]['namaZona'] = $_POST['namaZona'];
    $_SESSION['rak'][$id]['nomorLorong'] = $_POST['nomorLorong'];
    $_SESSION['rak'][$id]['nomorRak'] = $_POST['nomorRak'];
    $_SESSION['rak'][$id]['kapasitas'] = $_POST['kapasitas'];
}

/* Proses hapus */
if (isset($_GET['hapus'])) {

    $id = $_GET['hapus'];

    unset($_SESSION['rak'][$id]);

    $_SESSION['rak'] = array_values($_SESSION['rak']);
}

/* Data yang sedang diedit */
$dataEdit = null;

if (isset($_GET['edit'])) {
    $idEdit = $_GET['edit'];
    $dataEdit = $_SESSION['rak'][$idEdit];
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

<main>

    <section class="judul">
        <h1>Data Zonasi dan Rak Gudang</h1>
    </section>

    <section class="aksi">
        <a href="zonasi dan rak gudang.php">
            <button type="button">+ Tambah Rak</button>
        </a>
    </section>

    <?php if ($dataEdit != null) { ?>

    <section class="data-rak">

        <h3>Edit Data Rak</h3>

        <form method="post">

            <input type="hidden" name="id" value="<?= $idEdit ?>">

            <label>Nama Gudang</label>
            <input type="text" name="namaGudang"
                   value="<?= $dataEdit['namaGudang'] ?>">

            <label>Nama Zona</label>
            <select name="namaZona">

                <option value="penerimaan"
                    <?= $dataEdit['namaZona'] == 'penerimaan' ? 'selected' : '' ?>>
                    Zona Penerimaan
                </option>

                <option value="penyimpanan"
                    <?= $dataEdit['namaZona'] == 'penyimpanan' ? 'selected' : '' ?>>
                    Zona Penyimpanan
                </option>

                <option value="pengambilan"
                    <?= $dataEdit['namaZona'] == 'pengambilan' ? 'selected' : '' ?>>
                    Zona Pengambilan
                </option>

                <option value="pengiriman"
                    <?= $dataEdit['namaZona'] == 'pengiriman' ? 'selected' : '' ?>>
                    Zona Pengiriman
                </option>

            </select>

            <label>Nomor Lorong</label>
            <input type="text" name="nomorLorong"
                   value="<?= $dataEdit['nomorLorong'] ?>">

            <label>Nomor Rak</label>
            <input type="text" name="nomorRak"
                   value="<?= $dataEdit['nomorRak'] ?>">

            <label>Kapasitas Rak (kg)</label>
            <input type="number" name="kapasitas"
                   value="<?= $dataEdit['kapasitas'] ?>" min="1">

            <button type="submit" name="update">Update</button>

        </form>

    </section>

    <?php } ?>

    <section class="data-rak">

        <h3>Daftar Rak Gudang</h3>

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

                <?php
                $no = 1;

                foreach ($_SESSION['rak'] as $id => $data) {
                ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['namaGudang'] ?></td>
                    <td><?= $data['namaZona'] ?></td>
                    <td><?= $data['nomorLorong'] ?></td>
                    <td><?= $data['nomorRak'] ?></td>
                    <td><?= $data['kapasitas'] ?> kg</td>

                    <td>
                        <a href="index.php?edit=<?= $id ?>">
                            <button type="button">Edit</button>
                        </a>

                        <a href="index.php?hapus=<?= $id ?>">
                            <button type="button">Hapus</button>
                        </a>
                    </td>
                </tr>

                <?php } ?>

            </tbody>

        </table>

    </section>

</main>

</body>
</html>