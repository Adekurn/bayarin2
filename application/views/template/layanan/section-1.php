<div class='conta'>
    <div class='tab-box'>
        <input hidden type="radio" name="tab-name" id="tab-1" checked>
        <button type="button" class="btn" style="background-color: #5F9EA0 ;">
            <label class="tab-control" for="tab-1">Listrik Pascabayar</label>
        </button>
    </div>

    <div class="row">
        <div class="col-md">
            <form action="<?= base_url('Layanan/serch'); ?>" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari id" name="id" autocomplete="off" autofocus
                        aria-describedby="button-addon2">
                    <input class="btn btn-primary" type="submit" name="submit">
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty($id) && !empty($penggunaan)) { ?>
    <div class="card" id="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Data Penggunaan Listrik</h5>
            <p class="card-text">Awas penipuan saat transaksi</p>
        </div>
        <div class="container mt-3">
            <div class="card mb-3" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">ID Pelanggan: <?= htmlspecialchars($penggunaan['id_penggunaan']); ?></h5>
                    <p class="card-text">
                        Bulan: <?= htmlspecialchars($penggunaan['bulan']); ?><br>
                        Tahun: <?= htmlspecialchars($penggunaan['tahun']); ?><br>
                        Meter Awal: <?= htmlspecialchars($penggunaan['meter_awal']); ?><br>
                        Meter Akhir: <?= htmlspecialchars($penggunaan['meter_akhir']); ?>
                    </p>
                </div>
                <div class="card-body">
                    <a href="<?= base_url('penggunaan'); ?>" class="card-link">Details</a>
                </div>
            </div>
        </div>
    </div>
    <?php } elseif (!empty($id) && empty($penggunaan)) { ?>
    <p>No data found for ID: <?= htmlspecialchars($id); ?>.</p>
    <?php } ?>
</div>