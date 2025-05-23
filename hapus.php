<?php
include 'db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM siswa WHERE id='$id'");

echo "<script>alert('Data berhasil dihapus');window.location='lihat.php';</script>";
