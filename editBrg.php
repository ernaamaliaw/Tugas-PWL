<?php
include "koneksi.php";
$id=$_GET["id"];
$sql="SELECT * FROM brg WHERE id='$id'";
$hasil=$conn->query($sql);
while($row=$hasil->fetch_assoc()){
    $nama=$row["nama"];
    $hrg=$row["hrg"];
    $jml=$row["jml"];
    $keterangan=$row["keterangan"];
    $foto=$row["foto"];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Ubah Data</h1>
        <form action="" method='post' enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID </label>
                <input type="number" class="form-control" id="id" name="id" value="<?= $id; ?>">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama </label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
            </div>
            <div class="mb-3">
                <label for="hrg" class="form-label">Harga</label>
                <input type="number" class="form-control" id="hrg" name="hrg" value="<?= $hrg; ?>">
            </div>
            <div class="mb-3">
                <label for="jml" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jml" name="jml" value="<?= $jml; ?>">
            </div>
            <div class=" mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $keterangan; ?>">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto" required>
                <img class="m-4" src="img/<?php echo $foto; ?>" width="150px" height="120px" /></br>
            </div>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </form>
    </div>

    <?php
include "koneksi.php";
include "uploadFoto.php";

if(isset($_POST['ubah'])){
$id=$_POST["id"];
$nama=$_POST["nama"];
$hrg=$_POST["hrg"];
$keterangan=$_POST["keterangan"];
$jml=$_POST["jml"];
$foto = $_FILES['foto']['name'];


$file_tmp = $_FILES['foto']['tmp_name'];
$sql = "UPDATE brg SET nama='$nama', hrg='$hrg', jml='$jml', keterangan='$keterangan', foto='$foto' WHERE id='$id'";
    if($conn->query($sql) === TRUE){
        $conn->close();
        header("location: index.php");
    }
    else {
        $conn->close();
        echo "New Records Failed";
    }
}
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>