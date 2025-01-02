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

<div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Lengkapi Pembayaran</h1>
                
                <form action="<?= site_url('/kasirctrl/prosespembayaran') ?>" method="post" enctype="multipart/form-data">

                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row">
                            <div class="form-item">
                                <label class="form-label my-3">Kode Pembayaran<sup>*</sup></label>
                                <input type="text" class="form-control" name="" readonly>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Nama<sup>*</sup></label>
                                <input type="text" class="form-control" name="nama_pel" value="pelanggan offline">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Alamat <sup>*</sup></label>
                                <input type="text" class="form-control" name="alamat" value="Toko Mala">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Kota<sup>*</sup></label>
                                <input type="text" class="form-control" name="kota" value="Pekalongan">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Kode Pos<sup>*</sup></label>
                                <input type="text" class="form-control" name="kode_pos" value="909">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Nomor HP<sup>*</sup></label>
                                <input type="text" class="form-control" name="no_hp" value="909">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email<sup>*</sup></label>
                                <input type="text" class="form-control" name="email" value="tokomala@gmail.com">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Foto<sup>*</sup></label>
                                <input type="text" class="form-control" name="foto" value="bayar langsung">
                            </div>
                            <hr>
                        
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Total Belanja :</h5>
                            <input type="text" name="subtotal" class="form-control" value="<?= $subtotal ?>" readonly>
                        </div>
                                </div>
          
                            <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place Order</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Checkout Page End -->
<?= $this->endSection('form') ?>