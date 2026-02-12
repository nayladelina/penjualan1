<?php
include 'koneksi.php';

$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$barang = mysqli_query($conn, "SELECT * FROM barang");

if(isset($_POST['simpan'])) {

    $tanggal = $_POST['tanggal'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];

    // Ambil harga barang
    $ambil = mysqli_query($conn, "SELECT harga FROM barang WHERE id_barang='$id_barang'");
    $data_barang = mysqli_fetch_assoc($ambil);
    $harga = $data_barang['harga'];

    $total = $harga * $jumlah;

    mysqli_query($conn, "
        INSERT INTO transaksi (tanggal, id_pelanggan, total_harga)
        VALUES ('$tanggal', '$id_pelanggan', '$total')
    ");

    echo "<script>
        alert('Transaksi berhasil ditambahkan!');
        window.location='dashboard.php?page=transaksi';
    </script>";
}
?>

<style>
.card {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    width: 60%;
}

input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
}

button {
    padding: 10px 15px;
    background: #27ae60;
    color: white;
    border: none;
    border-radius: 5px;
}
</style>

<div class="card">
    <h3>Tambah Transaksi</h3>

    <form method="POST">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" readonly>


        <label>Pelanggan</label>
        <select name="id_pelanggan" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php while($p = mysqli_fetch_assoc($pelanggan)) : ?>
                <option value="<?= $p['id_pelanggan']; ?>">
                    <?= $p['nama_pelanggan']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Barang</label>
        <select name="id_barang" required>
            <option value="">-- Pilih Barang --</option>
            <?php while($b = mysqli_fetch_assoc($barang)) : ?>
                <option value="<?= $b['id_barang']; ?>">
                    <?= $b['nama_barang']; ?> - Rp<?= number_format($b['harga']); ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Jumlah</label>
        <input type="number" name="jumlah" required>

        <button type="submit" name="simpan">Simpan</button>
    </form>
</div>
