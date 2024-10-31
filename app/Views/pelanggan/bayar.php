<head>
    <meta charset="utf-8">
    <title>Fruitables - Vegetable Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url('asset-tambahan') ?>/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url('asset-tambahan') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url('asset-tambahan') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url('asset-tambahan') ?>/css/style.css" rel="stylesheet">
</head>




<h1>Keranjang Belanja</h1>

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">

            <?php if (!empty($cart)) : ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah Barang</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php foreach ($cart as $item) : ?>
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="<?= base_url('upload/' . $item['foto']) ?>" alt="<?= $item['nama_barang'] ?>" width="100" height="auto">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4"><?= $item['nama_barang'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rp.<?= $item['harga_barang'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4"><?= $item['quantity'] ?></p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">Rp<?= $item['harga_barang'] * $item['quantity'] ?></p>
                                </td>
                                <td>
                                    <button class="btn btn-md rounded-circle bg-light border mt-4">
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>
                            <?php endforeach; ?>
                    </tbody>
                </table>


        </div>
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

                        <a href="<?= site_url('/pelangganctrl/sukses') ?>" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">CASH</a>
                        <a href="<?= site_url('/pelangganctrl/sukses') ?>" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">QRIS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else : ?>
    <p>Keranjang Anda kosong.</p>
<?php endif; ?>
<!-- Cart Page End -->