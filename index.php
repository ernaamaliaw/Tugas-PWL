<?php
    include "koneksi.php";

    $sql = "SELECT * FROM brg ORDER BY id";
    $hasil = $conn -> query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <title>Daftar Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <?php
    if ($hasil -> num_rows>0) {
        echo '<table class="container table table-hover mt-5"><th>ID</th><th>NAMA BARANG</th><th>HARGA</th><th>JUMLAH</th><th>KETERANGAN</th><th>FOTO</th><th>EDIT</th><th>HAPUS</th>';
        while ($row = $hasil -> fetch_assoc()) {
            $teks ="<tr>";
            $teks .="<td>".$row["id"]."</td>";
            $teks .="<td>".$row["nama"]."</td>";
            $teks .="<td>".$row["hrg"]."</td>";
            $teks .="<td>".$row["jml"]."</td>";
            $teks .="<td>".$row["keterangan"]."</td>";
            $teks .="<td><img src='img/" .$row["foto"]."' style='width: 100px; height: 100px;'></img></td>";
            $teks .="<td><a class='btn btn-warning' href='editBrg.php?id=" .$row["id"]."'>Edit</a></td>";
            $teks .="<td><a class='btn btn-danger' href='delBrg.php?id=" .$row["id"]."'>Hapus</a></td>";
            $teks .="</tr>";

            echo $teks;
        }
        echo "</table>";
        echo "<center><a class='btn btn-primary mt-5' href='addBrg.php'>Tambah Data</a></center>";
    } else {
        echo "jml rec: 0";
    }
    $conn -> close();

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>