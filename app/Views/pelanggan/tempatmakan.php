<?= $this->extend('main/layout2')?>

<?= $this->section('judul')?>
TEMPAT MAKAN
<?= $this->endSection('judul')?>

<?= $this->section('isi')?>

<?php foreach ($datadapur as $barang) : ?>
                    <div class="col">
                      <div class="product-item">
                        <span class="badge bg-success position-absolute m-3">-30%</span>
                        
                        <figure>
                          <a href="index.html" title="Product Title">
                          <img src="<?= base_url('upload/' . $barang['foto']) ?>" alt="<?= $barang['nama_barang'] ?>" class="tab-i">
                          </a>
                        </figure>
                        <h3><?= $barang['nama_barang']?></h3>
                        <h3><?= $barang['kd_barang']?></h3>
                        <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary"><use xlink:href="#star-solid"></use></svg> 4.5</span>
                        <span class="price"><?= $barang['harga_barang']?></span>
                        <div class="d-flex align-items-center justify-content-between">
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
                        
                        <!-- button tambah keranjang -->
                        <form action="<?= base_url('pelangganctrl/tambahkeranjang')?>" method="post">
                          <input type="hidden" name="kd_barang" id="kd_barang" value="<?= $barang['kd_barang']?>">
                          <button type="submit" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></button>
                        </form>
                      </div>
                    </div>
                    <?php endforeach ?>

<?= $this->endSection('isi')?>