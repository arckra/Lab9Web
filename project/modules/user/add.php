<?php
if (isset($_POST['submit'])) {

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga_jual = $_POST['harga_jual'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];

    $gambar = '';
    if ($_FILES['file_gambar']['error'] === 0) {
        $file = $_FILES['file_gambar'];
        $name = str_replace(" ", "_", $file['name']);
        $dest = "gambar/" . $name;
        move_uploaded_file($file['tmp_name'], $dest);
        $gambar = $dest;
    }

    $sql = "INSERT INTO data_barang (nama, kategori, harga_jual, harga_beli, stok, gambar)
            VALUES ('$nama','$kategori','$harga_jual','$harga_beli','$stok','$gambar')";

    mysqli_query($conn, $sql);

    header("Location: index.php?page=user/list");
}
?>

<h2>Tambah Barang</h2>

<form method="post" enctype="multipart/form-data" class="form">
    <label>Nama Barang</label>
    <input type="text" name="nama">

    <label>Kategori</label>
    <select name="kategori">
        <option value="Komputer">Komputer</option>
        <option value="Elektronik">Elektronik</option>
        <option value="Hand Phone">Hand Phone</option>
    </select>

    <label>Harga Jual</label>
    <input type="text" name="harga_jual">

    <label>Harga Beli</label>
    <input type="text" name="harga_beli">

    <label>Stok</label>
    <input type="text" name="stok">

    <label>Gambar</label>
    <input type="file" name="file_gambar">

    <button class="btn add" name="submit">Simpan</button>
</form>
