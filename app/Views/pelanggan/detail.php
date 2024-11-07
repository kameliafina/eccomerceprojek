<?= $this->extend('main/layout2') ?>

<?= $this->section('judul') ?>
DETAIL BELANJA
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>

<?= form_open('/pelangganctrl/tampildetail')?>
<!--  -->
    <div class="row banner-content p-5">
        <div class="content-wrapper col-md-7">
            <div class="categories sale mb-3 pb-3">20% off</div>
            <h3 class="banner-title"><?= $datadapur['nama_barang']?></h3>
            <p class="banner-description">Harga: <?= $datadapur['harga_barang'] ?></p>
            <p class="banner-description">Kode Barang: <?= $datadapur['kd_barang']?></p>
            <a href="#" class="d-flex align-items-center nav-link">Shop Collection <svg width="24" height="24"><use xlink:href="#arrow-right"></use></svg></a>
        </div>
    </div>
</div>
<?= form_close()?>
<?= $this->endSection('isi') ?>
