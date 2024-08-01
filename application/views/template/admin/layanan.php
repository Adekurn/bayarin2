<!-- Main Content -->
<div id="content">

    <?php include('admin_topbar.php'); ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pelanggan</h1>

        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="table-responsive table-bordered col-sm-10 ml-auto mr-auto mt-2">
                <div class="page-header">
                    <span class="fas fa-users text-primary mt-2"> Data Pelanggan Listrik</span>
                    <a class="text-danger" href="<?= base_url('layanan'); ?>"><i class="fas fa-search mt-2 float-right"> Tampilkan</i></a>
                    <a href="<?= base_url('Admin/tambahuser')  ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data Pelanggan</a>
                </div>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Pelanggan</th>
                            <th>Username</th>
                            <th>Nomor Kwh</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($pelanggan)) { ?>
                            <?php
                            $i = 1;
                            foreach ($pelanggan as $a) { ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= htmlspecialchars($a['id_pelanggan']); ?></td>
                                    <td><?= htmlspecialchars($a['username']); ?></td>
                                    <td><?= htmlspecialchars($a['nomor_kwh']); ?></td>
                                    <td><?= htmlspecialchars($a['nama_pelanggan']); ?></td>
                                    <td><?= htmlspecialchars($a['alamat']); ?></td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                            <tr>
                                <td colspan="6">Tidak ada data ditemukan.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->