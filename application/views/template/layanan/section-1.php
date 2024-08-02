<div class='conta'>
    <div class='tab-box'>
        <input hidden type="radio" name="tab-name" id="tab-1" checked>
        <button type="button" class="btn" style="background-color: black; color: white;">
            <label class="tab-control" for="tab-1">Listrik Pascabayar</label>
        </button>
    </div>

    <div class="row">
        <div class="col-md">
            <form action="<?= base_url('Layanan/serch'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari id" name="id" autocomplete="off" autofocus aria-describedby="button-addon2">
                    <input class="btn btn-primary" type="submit" name="submit">
                </div>
            </form>
        </div>
    </div>

    <div class="container mt-3">
        <?php if (!empty($id) && !empty($pelanggan)) { ?>
            <div class="card" id="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Data Penggunaan Listrik</h5>
                    <p class="card-text">Awas penipuan saat transaksi</p>
                </div>
                <div class="container mt-3">
                    <div class="card mb-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">ID Pelanggan: <?= htmlspecialchars($pelanggan['id_pelanggan']); ?></h5>
                            <p class="card-text">
                                Nama Pelanggan: <?= htmlspecialchars($pelanggan['nama_pelanggan']); ?><br>
                                Bulan: <?= htmlspecialchars($pelanggan['bulan']); ?><br>
                                Tahun: <?= htmlspecialchars($pelanggan['tahun']); ?><br>
                                Meter Awal: <?= htmlspecialchars($pelanggan['meter_awal']); ?><br>
                                Meter Akhir: <?= htmlspecialchars($pelanggan['meter_akhir']); ?>
                            </p>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url('Layanan/tagihan'); ?>" class="card-link">Details</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } elseif (!empty($id) && empty($pelanggan)) { ?>
            <p>No data found for ID: <?= htmlspecialchars($id); ?>.</p>
        <?php } ?>
    </div>

</div>