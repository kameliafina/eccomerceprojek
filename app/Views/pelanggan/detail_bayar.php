<h1>Checkout Berhasil</h1>
<p>Nama: <?= $data['nama'] ?></p>
<p>Alamat: <?= $data['alamat'] ?></p>
<p>Kota: <?= $data['kota'] ?></p>
<p>Kode Pos: <?= $data['kode_pos'] ?></p>
<p>Nomor HP: <?= $data['nomor_hp'] ?></p>
<p>Email: <?= $data['email'] ?></p>
<p>Bukti Pembayaran: <?= $data['bukti_pembayaran'] ? '<img src="' . base_url('uploads/' . $data['bukti_pembayaran']) . '" alt="Bukti">' : 'Tidak ada bukti pembayaran' ?></p>
