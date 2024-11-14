<div class="container-fluid">
    <div class="row">
        <?php
            require 'admin/templatess/menu.php';
            $id = $_GET['id'];
            $query = "SELECT * FROM jabatan WHERE id = '$id'";
            $result = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_assoc($result);
        ?>
        <main class="col-md-6 ms-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Jabatan</h1>
            </div>
            <div class="card col-md-6">
                <div class="card-header">
                    Form Edit Jabatan
                </div>
                <div class="card-body">
                    <form action="function\edit.php?jabatan=edit" method="POST">
                        <input type="hidden" value="<?php echo $row['id']; ?>" name="id">
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" value="<?php echo htmlspecialchars($row['jabatan']); ?>" id="jabatan" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control" name="keterangan" id="keterangan" required><?php echo htmlspecialchars($row['keterangan']); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> Ubah
                        </button>
                        <a href="index.php?page=jabatan" class="btn btn-secondary">
                            <i class="fa fa-times" aria-hidden="true"></i> Batal
                        </a>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>
