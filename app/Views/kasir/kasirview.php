<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
KASIR
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<a href="<?= site_url('/kasirctrl/lihatkeranjang') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/plus.png" alt="Category Thumbnail"> Tambah Data</a>
<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Id Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Satuan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($databarang as $barang) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $barang['kd_barang']?></td>
      <td><?= $barang['nama_barang']?></td>
      <td><?= $barang['harga_barang']?></td>
      <td>
      <form action="<?= base_url('kasirctrl/tambahkeranjang') ?>" method="post">
                    <input type="hidden" name="kd_barang" id="kd_barang" value="<?= $barang['kd_barang'] ?>">
                    <button type="submit" class="btn btn-primary">
                        <img src="<?php echo base_url('asset-pelanggan/images/plus.png') ?>" alt="Tambah" style="width: 20px; height: 20px;">
                    </button>
                </form>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<?= $this->endSection('form') ?>
