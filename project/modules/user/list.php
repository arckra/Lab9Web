<?php
$sql = "SELECT * FROM data_barang";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html> 
<html lang="en"> 
<head>
     <meta charset="UTF-8"> 
    <link href="aasets/css/style.css" rel="stylesheet" type="text/css" /> 
    <title>Data Barang</title> 
</head> 
<body> 
    <div class="container"> 
        <h1>Data Barang</h1> 
        <div class="main"> 
            <table> 
            <tr> 
                <th>Gambar</th> 
                <th>Nama Barang</th> 
                <th>Katagori</th> 
                <th>Harga Jual</th> 
                <th>Harga Beli</th> 
                <th>Stok</th> 
                <th>Aksi</th> 
            </tr> 
            <?php if($result): ?> 
            <?php while($row = mysqli_fetch_array($result)): ?> 
            <tr> 
                <td><img src="assets/gambar/<?= $row['gambar'];?>" alt="<?= $row['nama'];?>"></td> 
                <td><?= $row['nama'];?></td> 
                <td><?= $row['kategori'];?></td> 
                <td><?= $row['harga_beli'];?></td> 
                <td><?= $row['harga_jual'];?></td> 
                <td><?= $row['stok'];?></td> 
                <td><?= $row['id_barang'];?></td>
                <td>
                    <a class="btn edit" href="index.php?page=user/edit&id=<?= $row['id_barang']; ?>">Edit</a>
                    <a class="btn delete" href="index.php?page=user/delete&id=<?= $row['id_barang']; ?>"
                       onclick="return confirm('Hapus data?')">Hapus</a>
                </td>
            </tr> 
            <?php endwhile; else: ?> 
            <tr> 
                <td colspan="7">Belum ada data</td> 
            </tr> 
            <?php endif; ?> 
            </table> 
        </div> 
    </div> 
</body> 
</html>
