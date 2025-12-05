<?php
$id = $_GET['id'];

$q = mysqli_query($conn, "SELECT * FROM data_barang WHERE id_barang='$id'");
$data = mysqli_fetch_assoc($q);

if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = $data['gambar'];

    if ($_FILES['file_gambar']['error'] === 0) {
        $file = $_FILES['file_gambar'];
        $name = str_replace(" ", "_", $file['name']);
        $dest = "gambar/" . $name;
        move_uploaded_file($file['tmp_name'], $dest);
        $gambar = $dest;
    }

    $sql = "UPDATE data_barang SET 
            nama='$nama',
            kategori='$kategori',
            harga_jual='$harga_jual',
            harga_beli='$harga_beli',
            stok='$stok',
            gambar='$gambar'
            WHERE id_barang='$id'";

    mysqli_query($conn, $sql);

    header("Location: index.php?page=user/list");
}
?>

<h2>Edit Barang</h2>

<form method="post" enctype="multipart/form-data" class="form">

    <label>Nama Barang</label>
    <input type="text" name="nama" value="<?= $data['nama']; ?>">

    <label>Kategori</label>
    <select name="kategori">
        <option <?= $data['kategori']=='Komputer'?'selected':'' ?>>Komputer</option>
        <option <?= $data['kategori']=='Elektronik'?'selected':'' ?>>Elektronik</option>
        <option <?= $data['kategori']=='Hand Phone'?'selected':'' ?>>Hand Phone</option>
    </select>

    <label>Harga Jual</label>
    <input type="text" name="harga_jual" value="<?= $data['harga_jual']; ?>">

    <label>Harga Beli</label>
    <input type="text" name="harga_beli" value="<?= $data['harga_beli']; ?>">

    <label>Stok</label>
    <input type="text" name="stok" value="<?= $data['stok']; ?>">

    <label>Gambar</label>
    <input type="file" name="file_gambar">

    <button class="btn edit" name="submit">Simpan</button>
</form>
