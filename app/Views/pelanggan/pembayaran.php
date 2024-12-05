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





<!-- Checkout Page Start -->
<div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="mb-4">Lengkapi Pembayaran</h1>
                
                <form action="<?= site_url('/pelangganctrl/proses') ?>" method="post" enctype="multipart/form-data">

                    <div class="row g-5">
                        <div class="col-md-12 col-lg-6 col-xl-7">
                            <div class="row">
                            <div class="form-item">
                                <label class="form-label my-3">Kode Pembayaran<sup>*</sup></label>
                                <input type="text" class="form-control" name="" readonly>
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Nama<sup>*</sup></label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Alamat <sup>*</sup></label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Kota<sup>*</sup></label>
                                <input type="text" class="form-control" name="kota">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Kode Pos<sup>*</sup></label>
                                <input type="text" class="form-control" name="kode_pos">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Nomor HP<sup>*</sup></label>
                                <input type="text" class="form-control" name="no_hp">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Email<sup>*</sup></label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-item">
                                <label class="form-label my-3">Upload Bukti<sup>*</sup></label>
                                <input type="file" class="form-control" name="bukti_pembayaran">
                            </div>
                            <hr>
                            
                            <h1 class="display-6 mb-4"> <span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Total Belanja :</h5>
                            <p class="mb-0">Rp<?= number_format($subtotal, 0, '.', '.') ?></p>
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