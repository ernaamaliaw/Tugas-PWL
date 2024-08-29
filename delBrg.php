<?php
include "koneksi.php";
$id = $_GET['id'];

$sql = "DELETE FROM brg WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {
    header("location:index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
