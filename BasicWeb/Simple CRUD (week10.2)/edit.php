<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Anggota</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <?php
  include('koneksi.php');
  $id = $_GET['id'];
  $query = "SELECT * FROM anggota WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);
  mysqli_close($koneksi);
  ?>

  <div class="container mt-4">
    <h2>Edit Data Anggota</h2>
    <form action="proses.php?aksi=ubah" method="post">
      <input type="hidden" name="id" value="<?= $row['id']; ?>">

      <!-- Nama Field -->
      <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?= $row['nama']; ?>" required>
      </div>

      <!-- Jenis Kelamin Field -->
      <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <div class="form-check">
          <input type="radio" class="form-check-input" name="jenis_kelamin" value="L" id="laki" <?= ($row['jenis_kelamin'] == 'L') ? 'checked' : ''; ?> required>
          <label class="form-check-label" for="laki">Laki-Laki</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" name="jenis_kelamin" value="P" id="perempuan" <?= ($row['jenis_kelamin'] == 'P') ? 'checked' : ''; ?> required>
          <label class="form-check-label" for="perempuan">Perempuan</label>
        </div>
      </div>

      <!-- Alamat Field -->
      <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $row['alamat']; ?>" required>
      </div>

      <!-- No. Telp Field -->
      <div class="form-group">
        <label for="no_telp">No. Telp:</label>
        <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= $row['no_telp']; ?>" required>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

    <!-- Back Button -->
    <a class="btn btn-secondary mt-2" href="index.php">Kembali</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>