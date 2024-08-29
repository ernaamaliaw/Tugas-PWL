<?php

include "koneksi.php";
include "uploadFoto.php";

$qry = true;
$flagFoto = true;
if(isset($_POST['ubah foto'])){
  if(upload_foto($_FILES["foto"])){
    $foto = $_FILES["foto"]["nama"];
    $sql = "UPDATE brg SET nama='$nama', hrg='$hrg', jml='$jml', keterangan='$keterangan', foto='$foto' WHERE id='$id'";
  } else{
    $qty = false;
    echo "foto gagal diupload";
  }
} else {
  $sql = "UPDATE brg SET nama='$nama', hrg='$hrg', jml='$jml', keterangan='$keterangan' WHERE id='$id'";
}

if($qry == true){
  if($conn -> query($sql) === TRUE){
    if(is_file("/img".$foto_lama) && ($flagFoto == true)) //jika gambar ada
      unlink("/img".$foto_lama);
    $conn -> close();
    header("location: index.php");
  } else{
    $conn -> close();
    echo "New records failed";
  }
}

?>