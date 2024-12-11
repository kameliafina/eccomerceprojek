<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
BARANG
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<a href="<?= site_url('/userctrl/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
<img src="<?php echo base_url('asset-pelanggan') ?>/images/plus.png" alt="Category Thumbnail"> Tambah Data</a>

<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Id Pelanggan</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($datauser as $user) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $user['id_pel']?></td>
      <td><?= $user['nama_pel']?></td>
      
      <td>
        <a href="#" class="btn btn-danger btn-circle">
          <i class="fas fa-trash"></i></a>
        <a href="#" class="btn btn-success btn-circle">
          <i class="fas fa-edit"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
<?= $this->endSection('form') ?>
