<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Siswa</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: center;
    }

    th {
      background-color: #2d7c2d;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .container {
      max-width: 900px;
      margin: 30px auto;
      background: white;
      padding: 25px;
      border-radius: 8px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    a.kembali {
      display: inline-block;
      margin-top: 15px;
      color: #2d7c2d;
      text-decoration: none;
      font-weight: bold;
    }

    a.kembali:hover {
      text-decoration: underline;
    }
    .btn-edit {
      color: white;
      background-color: blue;
      padding: 6px 10px;
      text-decoration: none;
      border-radius: 4px;
      margin-right: 5px;
    }

    .btn-edit:hover {
      background-color: darkblue;
    }

    .btn-hapus {
      color: white;
      background-color: red;
      padding: 6px 10px;
      text-decoration: none;
      border-radius: 4px;
    }

    .btn-hapus:hover {
      background-color: darkred;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Data Siswa</h2>
    <nav>
      <a href="index.html">Tambah Data</a>
      <a href="lihat.php">Lihat Data</a>
    </nav>
  </div>

  <div class="container">
    <h3>Daftar Data Siswa</h3>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NISN</th>
          <th>Kelas</th>
          <th>Jenis Kelamin</th>
          <th>Jurusan</th>
          <th>Sebagai</th>
          <th>Aksi</th> <!-- Kolom untuk tombol edit & hapus -->
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($conn, "SELECT * FROM siswa");
        while ($row = mysqli_fetch_assoc($query)) {
          echo "<tr>
                  <td>".$no++."</td>
                  <td>".$row['nama']."</td>
                  <td>".$row['nisn']."</td>
                  <td>".$row['kelas']."</td>
                  <td>".$row['jenis_kelamin']."</td>
                  <td>".$row['jurusan']."</td>
                  <td>".$row['sebagai']."</td>
                  <td>
                    <a href='edit.php?id=" . $row['id'] . "' class='btn-edit'>Edit</a>
                    |
                    <a href='hapus.php?id=" . $row['id'] . "' class='btn-hapus' onclick='return confirm(\"Yakin ingin hapus?\")'>Hapus</a>
                  </td>
                </tr>";
        }
        ?>
      </tbody>
    </table>

    <a class="kembali" href="index.html">← Kembali ke Tambah Data</a>
  </div>
</body>
</html>
