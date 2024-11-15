<table id="example" class="table table-striped table-bordered" style="width:100%">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>No Telp</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include('koneksi.php');
    $no = 1;
    $query = "SELECT * FROM anggota ORDER BY id DESC";
    $sql = $dbl->prepare($query);
    $sql->execute();
    $res = $sql->get_result();

    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $id = $row['id'];
        $nama = $row['nama'];
        $jenis_kelamin = ($row['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan';
        $alamat = $row['alamat'];
        $no_telp = $row['no_telp'];
    ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $nama; ?></td>
          <td><?= $jenis_kelamin; ?></td>
          <td><?= $alamat; ?></td>
          <td><?= $no_telp; ?></td>
          <td>
            <!-- Edit Button -->
            <button id="<?= $id; ?>" class="btn btn-success btn-sm edit_data">
              <i class="fa fa-edit"></i> Edit
            </button>
            <!-- Delete Button -->
            <button id="<?= $id; ?>" class="btn btn-danger btn-sm hapus_data">
              <i class="fa fa-trash"></i> Hapus
            </button>
          </td>
        </tr>
      <?php
      }
    } else {
      ?>
      <tr>
        <td colspan="6">Tidak ada data ditemukan</td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable(); // Initialize DataTable
  });
  // Function to reset error messages
  function reset() {
    document.getElementById("err_nama").innerHTML = "";
    document.getElementById("err_jenis_kelamin").innerHTML = "";
    document.getElementById("err_alamat").innerHTML = "";
    document.getElementById("err_no_telp").innerHTML = "";
  }

  // Handle edit button click event
  $(document).on('click', '.edit_data', function() {
    $('html, body').animate({
      scrollTop: 0
    }, 'slow'); // Scroll to top

    var id = $(this).attr('id'); // Get the ID of the clicked element

    // AJAX request to get data
    $.ajax({
      type: "POST",
      url: "/BasicWeb/BasicWeb/Simple%20CRUD%20(week10.2)/ajax/get_data.php",
      data: {
        id: id
      },
      dataType: 'json',
      success: function(response) {
        reset(); // Reset error messages
        console.log(response);
        // Scroll down to the form
        $('html, body').animate({
          scrollTop: 30
        }, 'slow');

        // Populate the form with the response data
        document.getElementById("id").value = response.id;
        document.getElementById("nama").value = response.nama;
        document.getElementById("alamat").value = response.alamat;
        document.getElementById("no_telp").value = response.no_telp;

        // Set gender radio button based on response
        if (response.jenis_kelamin === "L") {
          document.getElementById("jenkel1").checked = true;
        } else {
          document.getElementById("jenkel2").checked = true;
        }
      },
      error: function(response) {
        console.log(response.responseText); // Log errors in the console
      }
    });

  });

  $(document).on('click', '.hapus_data', function() {
    $('html, body').animate({
      scrollTop: 0
    }, 'slow'); // Scroll to top

    var id = $(this).attr('id');
    const csrf = $('meta[name="csrf-token"]').attr('content')

    fetch('/BasicWeb/BasicWeb/Simple%20CRUD%20(week10.2)/ajax/hapus_data.php', {
        method: 'POST',
        headers: {
          'csrf_token': csrf.toString()
        },
        body: JSON.stringify({
          id: id,
        })
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
  })
</script>