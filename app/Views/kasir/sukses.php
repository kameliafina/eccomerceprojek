<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
KASIR
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Data Pelanggan

<div class="d-flex justify-content-end">
<a href="<?= site_url('kasirctrl/databarang') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<h1>PEMBAYARAN SUKSES</h1>
<?= $this->endSection('form') ?>