<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Input dengan Validasi</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h1>Form Input dengan Validasi</h1>
  
  <form id="myForm" method="post" action="process_validation.php">
    <!-- Input Nama -->
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama">
    <span id="nama-error" style="color: red;"></span>
    <br>

    <!-- Input Email -->
    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    <span id="email-error" style="color: red;"></span>
    <br>

    <input type="submit" value="Submit">
  </form>

  <!-- jQuery Validation Script -->
  <script>
    $(document).ready(function () {
      // Saat form disubmit
      $("#myForm").submit(function (event) {
        var nama = $("#nama").val(); // Ambil nilai input nama
        var email = $("#email").val(); // Ambil nilai input email
        var valid = true; // Untuk mengecek apakah semua input valid

        // Validasi Nama
        if (nama === "") {
          $("#nama-error").text("Nama harus diisi.");
          valid = false;
        } else {
          $("#nama-error").text(""); // Hapus pesan error jika valid
        }

        // Validasi Email
        if (email === "") {
          $("#email-error").text("Email harus diisi.");
          valid = false;
        } else {
          $("#email-error").text(""); // Hapus pesan error jika valid
        }

        // Jika validasi gagal, hentikan pengiriman form
        if (!valid) {
          event.preventDefault();
        }
      });
    });
  </script>
</body>
</html>
