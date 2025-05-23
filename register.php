<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nama           = $_POST['nama'];
  $nisn           = $_POST['nisn'];
  $kelas          = $_POST['kelas'];
  $jenis_kelamin  = $_POST['jenis_kelamin'];
  $jurusan        = $_POST['jurusan'];
  $sebagai        = $_POST['sebagai'];

  $sql = "INSERT INTO siswa (nama, nisn, kelas, jenis_kelamin, jurusan, sebagai)
          VALUES ('$nama', '$nisn', '$kelas', '$jenis_kelamin', '$jurusan', '$sebagai')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data berhasil disimpan!'); window.location.href='index.html';</script>";
  } else {
    echo "Gagal menyimpan data: " . mysqli_error($conn);
  }
} else {
  echo "Akses ditolak.";
}
?>
