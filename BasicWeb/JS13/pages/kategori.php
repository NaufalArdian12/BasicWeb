<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kategori Buku</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Kategori</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Daftar Kategori Buku</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-md btn-primary" onclick="tambahData()"> Tambah
        </button>
      </div>
    </div>
    <div class="card-body">
      <table class="table table-sm table-bordered table-striped" id="table-data">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Kategori</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</section>
<div class="modal fade" id="form-data" style="display: none;" aria-hidden="true">
  <form action="action/kategoriAction.php?act=save" method="post" id="form-tambah">
    <!--	Ukuran Modal
modal-sm : Modal ukuran kecil modal-md : Modal ukuran sedang modal-lg : Modal ukuran besar
modal-xl : Modal ukuran sangat besar
penerapan setelah class modal-dialog seperti di bawah
-->
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Kategori</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Kode Kategori</label>
            <input type="text" class="form-control" name="kategori_kode"
              id="kategori_kode">
          </div>
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="kategori_nama"
              id="kategori_nama">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data- dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
  function tambahData() {
    $('#form-data').modal('show');
    $('#form-tambah').attr('action', 'action/kategoriAction.php?act=save');
    $('#kategori_kode').val('');
    $('#kategori_nama').val('');
  }

  function editData(id) {
    $.ajax({
      url: 'action/kategoriAction.php?act=get&id=' + id,
      method: 'post',
      success: function(response) {
        var data = JSON.parse(response);
        $('#form-data').modal('show');
        $('#form-tambah').attr('action', 'action/kategoriAction.php?act=update&id=' + id);
        $('#kategori_kode').val(data.kategori_kode);
        $('#kategori_nama').val(data.kategori_nama);
      }
    });
  }

  function deleteData(id) {
    if (confirm('Apakah anda yakin?')) {
      $.ajax({
        url: 'action/kategoriAction.php?act=delete&id=' + id,
        method: 'post',
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
      ajax: 'action/kategoriAction.php?act=load',
    });

    $('#form-tambah').validate({
      rules: {
        kategori_kode: {
          required: true,
          minlength: 3
        },
        kategori_nama: {
          required: true,
          minlength: 5
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      },
      submitHandler: function(form) {
        $.ajax({
          url: $(form).attr('action'),
          method: 'post',
          data: $(form).serialize(),
          success: function(response) {
            var result = JSON.parse(response);
            if (result.status) {
              $('#form-data').modal('hide');
              tabelData.ajax.reload(); // reload data tabel
            } else {
              alert(result.message);
            }
          }
        });
      }
    });
  });
</script>