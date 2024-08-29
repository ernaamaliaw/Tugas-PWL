<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Tambah Barang</h1>
        <form action="" method='post' enctype="multipart/form-data">
            <div class="mb-3">
                <label for="id" class="form-label">ID </label>
                <input type="number" class="form-control" id="id" name="id">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama </label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="hrg" class="form-label">Harga</label>
                <input type="number" class="form-control" id="hrg" name="hrg">
            </div>
            <div class="mb-3">
                <label for="jml" class="form-label">Jumlah</label>
                <input type="number" class="form-control" id="jml" name="jml">
            </div>
            <div class=" mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <?php
include "koneksi.php";
include "uploadFoto.php";

if(isset($_POST['tambah'])){
$id=$_POST["id"];
$nama=$_POST["nama"];
$hrg=$_POST["hrg"];
$keterangan=$_POST["keterangan"];
$jml=$_POST["jml"];
$foto = $_FILES['foto']['name'];

$file_tmp = $_FILES['foto']['tmp_name'];
$sql = "INSERT INTO brg (id,nama,hrg,jml,keterangan,foto) VALUES 
('$id','$nama','$hrg','$jml','$keterangan','$foto')";
    if($conn -> query($sql) === TRUE){
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