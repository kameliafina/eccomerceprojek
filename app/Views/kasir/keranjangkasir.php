<?= $this->extend('main/layout') ?>

<?= $this->section('judul') ?>
BARANG
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>

<table class="table table-hover mt-3">
  <br>

  <?php if (!empty($cart)) : ?>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">Id Barang</th>
      <th scope="col">Nama Barang</th>
      <th scope="col">Harga Satuan</th>
      <th scope="col">Jumlah Barang</th>
      <th scope="col">Total</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($cart as $barang) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $barang['kd_barang']?></td>
      <td><?= $barang['nama_barang']?></td>
      <td><?= $barang['harga_barang']?></td>
      <td>
      <form action="<?= site_url('pelangganctrl/update_quantity') ?>" method="POST">
                                            <input type="hidden" name="kd_barang" value="<?= $barang['kd_barang'] ?>">
                                            <input type="number" class="form-control text-center" value="<?= $barang['quantity'] ?>" min="1" name="quantity" readonly>
                                        
                                        </form>
      </td>
      <td>
      <p class="mb-0 mt-4">Rp.<?= $barang['harga_barang'] * $barang['quantity'] ?></p>
      </td>
      <td>
        <a href="#" class="btn btn-primary btn-circle">
          <i class="fas fa-trash"></i></a>
      </td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>

<div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Total Belanja :</h5>
                            <p class="mb-0">Rp<?= number_format($subtotal, 0, '.', '.') ?></p>
                        </div>

                        <a href="<?= site_url('kasirctrl/pembayaran') ?>" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Bayar</a>
                    </div>
                </div>
            </div>
        </div>

<?php else : ?>
    <p>Keranjang Anda kosong.</p>
<?php endif; ?>



<?= $this->endSection('form') ?>
