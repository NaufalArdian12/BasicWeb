<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Input dengan Validasi</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h1>Form Input dengan Validasi</h1>
  
  <form id="ajaxForm">
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

    <!-- Input Password -->
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <span id="password-error" style="color: red;"></span>
    <br>

    <input type="submit" value="Submit">
  </form>

  <!-- Tempat untuk menampilkan hasil -->
  <div id="hasil">
    <!-- Hasil dari server akan muncul di sini -->
  </div>

  <!-- jQuery AJAX Script with Password Validation -->
  <script>
    $(document).ready(function () {
      // Saat form disubmit
      $("#ajaxForm").submit(function (event) {
        event.preventDefault(); // Mencegah pengiriman form secara default

        // Mengambil data dari form
        var nama = $("#nama").val();
        var email = $("#email").val();
        var password = $("#password").val();
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

        // Validasi Password (Minimal 8 karakter)
        if (password.length < 8) {
          $("#password-error").text("Password harus minimal 8 karakter.");
          valid = false;
        } else {
          $("#password-error").text(""); // Hapus pesan error jika valid
        }

        // Jika semua validasi berhasil, lakukan AJAX
        if (valid) {
          $.ajax({
            type: "POST",
            url: "proses_validasi.php", // Ganti dengan URL file PHP yang akan memproses data
            data: {
              nama: nama,
              email: email,
              password: password
            },
            success: function (response) {
              // Tampilkan hasil dari server di div "hasil"
              $("#hasil").html(response);
            },
            error: function (xhr, status, error) {
              // Menangani jika ada error saat mengirim data
              console.log(xhr.responseText);
              $("#hasil").html("Terjadi kesalahan: " + error);
            }
          });
        }
      });
    });
  </script>
</body>
</html>
