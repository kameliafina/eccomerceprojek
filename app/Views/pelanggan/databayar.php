<table class="table table-hover mt-3">
  <br>
  <thead>
    <tr>
      <th scope="col">Id Pembayaran</th>
      <th scope="col">nama pelanggan</th>
      <th scope="col">Total Belanja</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $nomor = 1;
    foreach ($datapembayaran as $bayar) :
    ?>
    <th scope="row"><?= $nomor++;?></th>
      <td><?= $bayar['id_pembayaran']?></td>
      <td><?= $bayar['nama_pel']?></td>
      <td><?= $barang['subtotal']?></td>
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