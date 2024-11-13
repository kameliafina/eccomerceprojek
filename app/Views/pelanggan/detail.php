<?= $this->extend('main/layout2') ?>

<?= $this->section('judul') ?>
DETAIL BARANG

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url('upload/' . $barang['foto']) ?>" alt="<?= $barang['nama_barang'] ?>" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2><?= $barang['nama_barang'] ?></h2>
            <p>Kode Barang: <?= $barang['kd_barang'] ?></p>
            <p>Harga: <?= number_format($barang['harga_barang'], 0, ',', '.') ?> IDR</p>
            <p>Stok: <?= $barang['stok'] ?> Unit</p>
            <p>Deskripsi: <?= $barang['deskripsi'] ?></p>

            <div class="d-flex align-items-center justify-content-between mt-4">
                <div class="input-group product-qty">
                    <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                            <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                        </button>
                    </span>
                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1">
                    <span class="input-group-btn">
                        <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                            <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                        </button>
                    </span>
                </div>
            </div>

            <!-- Button Tambah ke Keranjang -->
            <form action="<?= base_url('pelangganctrl/tambahkeranjang') ?>" method="post" class="mt-4">
                <input type="hidden" name="kd_barang" value="<?= $barang['kd_barang'] ?>">
                <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('judul') ?>
