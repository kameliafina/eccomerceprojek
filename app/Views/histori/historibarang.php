<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
HISTORI
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<div class="d-flex justify-content-end">
    <a href="<?= site_url('historictrl/index') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <img src="<?php echo base_url('asset-pelanggan') ?>/images/back.png" alt="Category Thumbnail">Kembali</a>
</div>
<?= $this->endSection('isi') ?>

<?= $this->section('form') ?>

HISTORI BARANG TERJUAL

<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Id Keranjang</th>
      <th scope="col">Kode barang</th>
      <th scope="col">jumlah</th>
      <th scope="col">tanggal</th>
      <th scope="col">Nama barang</th>
      <th scope="col">Harga</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($databarang as $barang) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $barang['id_keranjang']?></td>
      <td><?= $barang['kd_barang']?></td>
      <td><?= $barang['quantity']?></td>
      <td><?= $barang['create_at']?></td>
      <td><?= $barang['nama_barang']?></td>
      <td><?= $barang['harga_barang']?></td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<?= $this->endSection('form') ?>
