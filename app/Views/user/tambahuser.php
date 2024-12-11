<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
BARANG
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
Tambah Data Barang

<div class="d-flex justify-content-end">
<a href="<?= site_url('userctrl/datauser') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

<?= form_open('/userctrl/simpan', ['enctype' => 'multipart/form-data'])?>
<form>

  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Kode Pelanggan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="id_pel" readonly>
    </div>
  </div>
  <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Nama pelanggan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nama_pel">
    </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Input </button>

</form>
<?= form_close(); ?>
<?= $this->endSection('form') ?>