<?php
include 'config.php';

// Ambil data dari database
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Daftar Mahasiswa</h2>
    
    <a href="tambah.php"><button>Tambah Mahasiswa</button></a>

    <table>
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Jurusan</th>
        <th>Aksi</th>
      </tr>

      <?php
      $no = 1;
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>$no</td>
                <td>{$row['nim']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['jurusan']}</td>
                <td class='action-buttons'>
                  <a href='edit.php?id={$row['id']}' class='edit-btn'>Edit</a>
                  <a href='hapus.php?id={$row['id']}' class='delete-btn' onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                </td>
              </tr>";
        $no++;
      }
      ?>
    </table>
  </div>


</body>
</html>
