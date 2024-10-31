<head>
    <link href="<?php echo base_url('asset-tambahan') ?>/css/bootstrap.min.css" rel="stylesheet">
</head>

<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">
                <div class="px-5 ms-xl-4">
                    <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
                    <img src="<?php echo base_url('asset-pelanggan') ?>/images/logo2.png" alt="logo" class="img-fluid">
                </div>

                <?php if (session()->getFlashdata('error')): ?>
                    <div style="color: red;"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
                    <form action="/auth/tambah" method="post" style="width: 23rem;">
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">BUAT AKUN</h3>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" name="username" required class="form-control form-control-lg" />
                            <label class="form-label" for="username">Email address</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" name="password" required class="form-control form-control-lg" />
                            <label class="form-label" for="password">Password</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" name="email" required class="form-control form-control-lg" />
                            <label class="form-label" for="email">email</label>
                        </div>

                        <div class="pt-1 mb-4">
                            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-info btn-lg btn-block" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>