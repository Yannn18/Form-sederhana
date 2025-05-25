<?php include 'config.php'; ?>
<?php

  $error = '';
if (isset($_POST['simpan'])) {
  $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $jurusan = trim($_POST['jurusan']);

    if (empty($nim) || empty($nama) || empty($jurusan)) {
        $error = "Semua field wajib diisi.";
    } else {
        mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES ('$nim', '$nama', '$jurusan')");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Edit Data Mahasiswa</h2>
  <?php if ($error): ?>
    <div class="error"><?= $error ?></div>
  <?php endif; ?>
  <form method="post" class="form" onsubmit="return validateForm()">
    
        <label for="nim">NIM:</label>
        <input type="text" name="nim"  id="nim">

        <label for="nama">Nama:</label>
    <input type="text" name="nama" id="nama">

    <label for="jurusan">jurusan:</label>
    <input type="text" name="jurusan" id="jurusan">

    <button type="submit" name="simpan">Update</button>
  </form>
</div>

<script>
function validateForm() {
    const nama = document.getElementById("nama").value.trim();
    const nim = document.getElementById("nim").value.trim();
    const jurusan = document.getElementById("jurusan").value.trim();

    if (!nama || !nim || !jurusan) {
        alert("Semua field wajib diisi!");
        return false;
    }

   

    return true;
}
</script>
    <?php
    if (isset($_POST['simpan'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];

        mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES ('$nim', '$nama', '$jurusan')");
        header("Location: index.php");
    }
    ?>
</body>
</html>
