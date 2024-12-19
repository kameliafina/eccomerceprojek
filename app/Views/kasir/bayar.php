<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
KASIR
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Data Pelanggan

<div class="d-flex justify-content-end">
<a href="<?= site_url('barangctrl/databarang') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<form action="<?= site_url('kasirctrl/prosespembayaran') ?>" method="post" enctype="multipart/form-data">
<form>

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Kode pembayaran</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama_pel">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="alamat">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Kota</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kota">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Kode Pos</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="kode_pos">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Nomor Hp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="no_hp">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="email">
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Upload Bukti</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="bukti_pembayaran">
    </div>
  </div>

  <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Total Belanja :</h5>
                            <input type="text" name="subtotal" class="form-control" value="<?= $subtotal ?>" readonly>
                        </div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>


<?= $this->endSection('form') ?>