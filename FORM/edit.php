<?php include 'config.php'; ?>
<?php
$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id"));

$error = '';
if (isset($_POST['simpan'])) {
    $nim = trim($_POST['nim']);
    $nama = trim($_POST['nama']);
    $jurusan = trim($_POST['jurusan']);

    if (empty($nim) || empty($nama) || empty($jurusan)) {
        $error = "Semua field wajib diisi.";
    } else {
        mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id=$id");
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
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
      <input type="text" name="nim" id="nim" value="<?= $data['nim'] ?>">
      
      <label for="nama">Nama:</label>
      <input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>">

    <label for="jurusan">jurusan:</label>
    <input type="text" name="jurusan" id="jurusan" value="<?= $data['jurusan'] ?>">

    <button type="submit" name="simpan">Update</button>
  </form>
</div>

    <?php
    if (isset($_POST['simpan'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $jurusan = $_POST['jurusan'];

        mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id=$id");
        header("Location: index.php");
    }
    ?>

     <script>
function validateForm() {
    const nim = document.getElementById("nim").value.trim();
    const nama = document.getElementById("nama").value.trim();
    const jurusan = document.getElementById("jurusan").value.trim();

    if (!nim || !nama || !jurusan) {
        alert("Semua field wajib diisi!");
        return false;
    }

return true;
}
</script>
</body>
</html>
