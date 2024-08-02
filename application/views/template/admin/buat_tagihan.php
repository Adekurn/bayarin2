<!-- Main Content -->
<div id="content">

    <?php include('admin_topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800"><?= $judul ?></h1>
        </div>

        <!-- Content Row -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center mt-2">
                            <h4><?= $judul ?></h4>
                        </div>
                        <div class="card-body shadow-lg">
                            <form action="tambah_pelanggan" method="POST">
                                <div class="form-group">
                                    <label for="nama">Id Penggunaan</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="username">Id Pelanggan</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="bulan">bulan</label>
                                    <input type="bulan" class="form-control" id="bulan" name="bulan">
                                    <?= form_error('bulan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun</label>
                                    <input type="date" class="form-control" id="tahun" name="tahun">
                                    <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Jumlah Meter</label>
                                    <input type="alamat" class="form-control" id="alamat" name="alamat">
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Status</label>
                                    <input type="alamat" class="form-control" id="alamat" name="alamat">
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="idtarif">ID Tarif</label>
                                    <select class="form-control" id="idtarif" name="idtarif">
                                        <option value="">Pilih ID Tarif</option>
                                        <option value="1">Tarif 1</option>
                                        <option value="2">Tarif 2</option>
                                        <option value="3">Tarif 3</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->