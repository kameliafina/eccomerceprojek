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

HISTORI PELANGGAN

<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Id Pembayaran</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Alamat</th>
      <th scope="col">Kota</th>
      <th scope="col">Kode Pos</th>
      <th scope="col">No Hp</th>
      <th scope="col">Email</th>
      <th scope="col">Total Belanja</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($datapelanggan as $pelanggan) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $pelanggan['id_pembayaran']?></td>
      <td><?= $pelanggan['nama_pel']?></td>
      <td><?= $pelanggan['alamat']?></td>
      <td><?= $pelanggan['kota']?></td>
      <td><?= $pelanggan['kode_pos']?></td>
      <td><?= $pelanggan['no_hp']?></td>
      <td><?= $pelanggan['email']?></td>
      <td><?= $pelanggan['subtotal']?></td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<?= $this->endSection('form') ?>
