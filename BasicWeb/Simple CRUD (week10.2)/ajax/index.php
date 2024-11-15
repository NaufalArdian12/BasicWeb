<?php
include 'auth.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="<?= $_SESSION['csrf_token']; ?>" />
  <title>Data Anggota</title>

  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Include FontAwesome CSS for icons -->
  <link href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" rel="stylesheet">

  <!-- Include DataTables CSS for styling tables -->
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <style>
    /* Custom Styles for the page */
    .navbar {
      background-color: #343a40;
    }

    .navbar-brand {
      color: #fff;
    }

    .container {
      margin-top: 30px;
    }
  </style>

</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Data Anggota</a>
    <a class="navbar-brand" href="index.php">CRUD Dengan Ajax</a>
  </nav>

  <div class="container">
    <h2 class="text-center" style="margin-bottom: 30px;">Data Anggota</h2>

    <form method="post" class="form-data" id="form-data">
      <div class="row">
        <!-- Hidden ID Field -->
        <div class="col-sm-9">
          <div class="form-group">
            <label for="id"></label>
            <input type="hidden" name="id" id="id">
          </div>
        </div>

        <!-- Name Field -->
        <div class="col-sm-9">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
            <p class="text-danger" id="err_nama"></p>
          </div>
        </div>

        <!-- Gender Field -->
        <div class="col-sm-3">
          <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label><br>
            <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required> Laki-laki
            <input type="radio" name="jenis_kelamin" id="jenkel2" value="P"> Perempuan
            <p class="text-danger" id="err_jenis_kelamin"></p>
          </div>
        </div>

        <!-- Address Field -->
        <div class="col-sm-9">
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
            <p class="text-danger" id="err_alamat"></p>
          </div>
        </div>

        <!-- Phone Number Field -->
        <div class="col-sm-9">
          <div class="form-group">
            <label for="no_telp">No Telepon</label>
            <input type="number" name="no_telp" id="no_telp" class="form-control" required>
            <p class="text-danger" id="err_no_telp"></p>
          </div>
        </div>

        <!-- Submit Button -->
        <div class="col-sm-9">
          <div class="form-group">
            <button type="button" name="simpanan" id="simpanan" class="btn btn-primary">
              <i class="fa fa-save"></i> Simpan
            </button>
          </div>
        </div>
      </div>
    </form>



    <div id="data"></div> <!-- Data table will be loaded here via AJAX -->
  </div>

  <footer class="text-center mt-4">
    <p>&copy; <?= date('Y'); ?> Design Dan Pengembangan Web</p>
  </footer>

  <!-- Scripts -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <script>
    $(document).ready(function() {
      // Set CSRF Token for AJAX requests
      $.ajaxSetup({
        headers: {
          'csrf_token': $('meta[name="csrf-token"]').attr('content')
        }
      });

      // Load Data Table
      $('#data').load('data.php'); // Load data into the div from data.php

      // Form Submit Handler
      $('#form-data').on('submit', function(e) {
        e.preventDefault();

        // Perform AJAX to submit the form data
        $.ajax({
          url: $(this).attr('action'),
          type: 'POST',
          data: $(this).serialize(),
          success: function(response) {
            // Reload the data after successful submission
            $('#data').load('data.php');
            $('#form-data')[0].reset(); // Reset form fields
          },
          error: function() {
            alert('Error! Please try again.');
          }
        });
      });
    });
  </script>

</body>

<!-- Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script>
  $("#simpanan").click(function() {
    var data = $('.form-data').serialize();
    let formDataRaw = $('.form-data').serializeArray()
    var indexed_array = {};
    let body;

    $.map(formDataRaw, function(n, i) {
      indexed_array[n['name']] = n['value'];
    });

    body = indexed_array

    var jenkel1 = document.getElementById("jenkel1").value;
    var jenkel2 = document.getElementById("jenkel2").value;
    var nama = document.getElementById("nama").value;
    var alamat = document.getElementById("alamat").value;
    var no_telp = document.getElementById("no_telp").value;

    // Validate Nama
    if (nama == "") {
      document.getElementById("err_nama").innerHTML = "Nama Harus Diisi";
    } else {
      document.getElementById("err_nama").innerHTML = "";
    }

    // Validate Alamat
    if (alamat == "") {
      document.getElementById("err_alamat").innerHTML = "Alamat Harus Diisi";
    } else {
      document.getElementById("err_alamat").innerHTML = "";
    }

    // Validate Gender
    if (jenkel1 == "" && jenkel2 == "") {
      document.getElementById("err_jenis_kelamin").innerHTML = "Jenis Kelamin Harus Dipilih";
      document.getElementById("jenkel1").checked = false;
      document.getElementById("jenkel2").checked = false;
    } else {
      document.getElementById("err_jenis_kelamin").innerHTML = "";
    }

    // Validate Phone Number
    if (no_telp == "") {
      document.getElementById("err_no_telp").innerHTML = "No Telepon Harus Diisi";
    } else {
      document.getElementById("err_no_telp").innerHTML = "";
    }

    const csrf = $('meta[name="csrf-token"]').attr('content')

    // Check if the required fields are filled out before submitting the form
    if (nama != "" && alamat != "" && (document.getElementById("jenkel1").checked || document.getElementById("jenkel2").checked) && no_telp != "") {
      fetch('/BasicWeb/BasicWeb/Simple%20CRUD%20(week10.2)/ajax/form_action.php', {
          method: 'POST',
          headers: {
            'csrf_token': csrf.toString()
          },
          body: JSON.stringify(body)
        }).then(response =>
          response.text()
        )
        .then(data => {
          console.log(data);
          document.getElementById("id").value = "";
          document.getElementById("form-data").reset();
          window.document.location.reload();
        })
        .catch(error => console.error(error.toString()));

      // $.ajax({
      //   type: "POST",
      //   url: "form_action.php",
      //   data: data,
      //   success: function(response) {
      //     // On success, load new data and reset form
      //     $('.data').load("data.php");
      //     document.getElementById("id").value = "";
      //     document.getElementById("form-data").reset();
      //   },
      //   error: function(response) {
      //     console.log(response.responseText);
      //   }
      // });
    }
  });
</script>

</html>