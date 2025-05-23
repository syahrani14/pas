<?php
include 'db.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="header">
    <h2>Edit Data Siswa</h2>
  </div>

  <div class="container">
    <form action="" method="post">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">

      <label>Nama</label>
      <input type="text" name="nama" value="<?= $row['nama'] ?>">

      <label>NISN</label>
      <input type="text" name="nisn" value="<?= $row['nisn'] ?>">

      <label>Kelas</label>
      <input type="text" name="kelas" value="<?= $row['kelas'] ?>">

      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin">
        <option <?= ($row['jenis_kelamin']=='Laki-Laki' ? 'selected' : '') ?>>Laki-Laki</option>
        <option <?= ($row['jenis_kelamin']=='Perempuan' ? 'selected' : '') ?>>Perempuan</option>
      </select>

      <label>Jurusan</label>
      <input type="text" name="jurusan" value="<?= $row['jurusan'] ?>">

      <label>Sebagai</label>
      <select name="sebagai">
        <option <?= ($row['sebagai']=='Siswa' ? 'selected' : '') ?>>Siswa</option>
        <option <?= ($row['sebagai']=='Guru' ? 'selected' : '') ?>>Guru</option>
      </select>

      <button type="submit" name="update">Simpan Perubahan</button>
    </form>
  </div>

<?php
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $nisn = $_POST['nisn'];
  $kelas = $_POST['kelas'];
  $jk = $_POST['jenis_kelamin'];
  $jurusan = $_POST['jurusan'];
  $sebagai = $_POST['sebagai'];

  mysqli_query($conn, "UPDATE siswa SET 
    nama='$nama', 
    nisn='$nisn', 
    kelas='$kelas', 
    jenis_kelamin='$jk', 
    jurusan='$jurusan', 
    sebagai='$sebagai' 
    WHERE id='$id'");

  echo "<script>alert('Data berhasil diupdate');window.location='lihat.php';</script>";
}
?>
</body>
</html>
