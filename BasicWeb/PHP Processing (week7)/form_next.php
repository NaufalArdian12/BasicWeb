<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Contoh Form dengan PHP</title>
</head>
<body>
  <h2>Form Contoh</h2>
  <form method="POST" action="process_next.php">
    <!-- Pilihan Buah -->
    <label for="buah">Pilih Buah:</label>
    <select name="buah" id="buah">
      <option value="apel">Apel</option>
      <option value="pisang">Pisang</option>
      <option value="mangga">Mangga</option>
      <option value="jeruk">Jeruk</option>
    </select>

    <br><br>

    <!-- Pilihan Warna Favorit -->
    <label>Pilih Warna Favorit:</label><br>
    <input type="checkbox" name="warna[]" value="merah"> Merah<br>
    <input type="checkbox" name="warna[]" value="biru"> Biru<br>
    <input type="checkbox" name="warna[]" value="hijau"> Hijau<br>

    <br>

    <!-- Pilihan Jenis Kelamin -->
    <label>Pilih Jenis Kelamin:</label><br>
    <input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki<br>
    <input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan<br>

    <br>

    <input type="submit" value="Submit">
  </form>
</body>
</html>