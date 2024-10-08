<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form Input with AJAX</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <h1>Form Input with AJAX</h1>
  
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

    <input type="submit" value="Submit">
  </form>

  <!-- Tempat untuk menampilkan hasil -->
  <div id="hasil">
    <!-- Hasil dari server akan muncul di sini -->
  </div>

  <!-- jQuery AJAX Script -->
  <script>
    $(document).ready(function () {
      // Saat form disubmit
      $("#ajaxForm").submit(function (event) {
        event.preventDefault(); // Mencegah pengiriman form secara default

        // Mengambil data dari form
        var formData = {
          nama: $("#nama").val(),
          email: $("#email").val()
        };

        // AJAX Request untuk mengirim data ke server PHP
        $.ajax({
          type: "POST",
          url: "process_validation_ajax.php", // Ganti dengan URL file PHP yang akan memproses data
          data: formData,
          dataType: "html",
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
      });
    });
  </script>
</body>
</html>
