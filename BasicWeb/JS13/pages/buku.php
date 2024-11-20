<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Daftar Buku</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Buku</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Buku</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-md btn-primary" onclick="tambahData()">Tambah</button>
      </div>
    </div>
    <div class="card-body">
      <table id="table-data" class="table table-sm table-bordered table-striped" id="table-data">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Buku</th>
            <th>Kode Buku</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- Modal Form -->
<div class="modal fade" id="form-data" style="display: none;" aria-hidden="true">
  <form action="action/bukuAction.php?act=save" method="post" id="form-tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Buku</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Buku</label>
            <input type="text" class="form-control" name="buku_kode" id="buku_kode" required>
          </div>
          <div class="form-group">
            <label>Nama Buku</label>
            <input type="text" class="form-control" name="buku_nama" id="buku_nama" required>
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori_id" id="kategori_id" required>
              <option value="">Pilih Kategori</option>
            </select>
          </div>
          <div class="form-group">
            <label>Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="jumlah" required>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" required></textarea>
          </div>
          <div class="form-group">
            <label>Gambar (URL)</label>
            <input type="url" class="form-control" name="gambar" id="gambar">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
  function tambahData() {
    $('#form-data').modal('show');
    $('#form-tambah').attr('action', 'action/bukuAction.php?act=save');
    $('#buku_kode').val('');
    $('#buku_nama').val('');
    $('#kategori_id').val(''); // Reset kategori dropdown
    $('#jumlah').val('');
    $('#deskripsi').val('');
    $('#gambar').val('');

    // Mengambil data kategori dari server
    $.ajax({
      url: 'action/bukuAction.php?act=load_kategori', // Pastikan URL ini benar
      method: 'GET',
      success: function(response) {
        var categories = JSON.parse(response);
        var kategoriSelect = $('#kategori_id');
        kategoriSelect.empty(); // Kosongkan dropdown sebelumnya
        kategoriSelect.append('<option value="">Pilih Kategori</option>'); // Menambah opsi default

        // Menambahkan kategori ke dropdown
        categories.forEach(function(category) {
          kategoriSelect.append('<option value="' + category.kategori_id + '">' + category.kategori_nama + '</option>');
        });
      }
    });
  }

  function editData(id) {
    $.ajax({
      url: 'action/bukuAction.php?act=get&id=' + id,
      method: 'POST',
      success: function(response) {
        var data = JSON.parse(response);
        $('#form-data').modal('show');
        $('#form-tambah').attr('action', 'action/bukuAction.php?act=update&id=' + id);
        $('#buku_kode').val(data.buku_kode);
        $('#buku_nama').val(data.buku_nama);
        $('#kategori_id').val(data.kategori_id); // Set the selected category
        $('#jumlah').val(data.jumlah);
        $('#deskripsi').val(data.deskripsi);
        $('#gambar').val(data.gambar);
      }
    });
  }

  function deleteData(id) {
    if (confirm('Apakah anda yakin?')) {
      $.ajax({
        url: 'action/bukuAction.php?act=delete&id=' + id,
        method: 'POST',
        success: function(response) {
          var result = JSON.parse(response);
          if (result.status) {
            tabelData.ajax.reload();
          } else {
            alert(result.message);
          }
        }
      });
    }
  }

  var tabelData;
  $(document).ready(function() {
    tabelData = $('#table-data').DataTable({
      ajax: 'action/bukuAction.php?act=load',
      columns: [{
          title: "No"
        },
        {
          title: "Nama Buku"
        },
        {
          title: "Kode Buku"
        },
        {
          title: "Kategori"
        },
        {
          title: "Jumlah"
        },
        {
          title: "Deskripsi"
        },
        {
          title: "Gambar",
          render: function(data) {
            return '<img src="' + data + '" style="width:50px;height:auto;">';
          }
        },
        {
          title: "Aksi"
        }
      ]
    });
  });
</script>