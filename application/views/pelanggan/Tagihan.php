<div class="card" style="width: 18rem;">

    <div class="card-body">
        <h5 class="card-title">Data Tagihan</h5>
        <p class="card-text">Pastikan melakukan pembayaran dengan benar jangan sampai anda tertipu oleh pihak-pihak Palsu, Harap melakukan pembayaran Melalui konter PLN langsung atau malalui web ini </p>
    </div>
    <div class="container mt-3">
        <?php foreach ($tagihan as $item) : ?>
            <?php foreach ($penggunaan as $kor) : ?>
                <div class="card mb-3" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">ID Tagihan: <?= $item['id_tagihan']; ?></h5>
                        <p class="card-text">
                            Id penggunaan :<?= $item['id_penggunaan']; ?><br>
                            Bulan: <?= $item['bulan']; ?><br>
                            Tahun: <?= $item['tahun']; ?><br>
                            jumlah Meter : <?= $kor['meter_awal'] . '-' . $kor['meter_akhir']; ?><br>
                            status : <?= $item['status']; ?><br>
                            id pelanggan : <?= $item['id_pelanggan']; ?><br>
                        </p>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('Layanan/tagihan'); ?>" class="card-link">Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>

</div>