<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Checkout</h2>
    
    <table class="table">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Harga Satuan</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($itemkeranjang)): ?>
                <?php foreach ($itemkeranjang as $item): ?>
                    <?php $barang = $barangmodel->find($item['kd_barang']); ?>
                    <tr>
                        <td><?= esc($barang['nama_barang']) ?></td>
                        <td><?= esc($item['quantity']) ?></td>
                        <td><?= esc(number_format($barang['harga'], 2)) ?></td>
                        <td><?= esc(number_format($barang['harga'] * $item['quantity'], 2)) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">Keranjang belanja kosong.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h4>Total Belanja: <?= esc(number_format($totalbelanja, 2)) ?></h4>
    
    <form action="/cekout" method="post">
        <button type="submit" class="btn btn-primary">Selesaikan Pembelian</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
