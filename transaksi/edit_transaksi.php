<?php
include __DIR__ . '/../koneksi.php';

$id = $_GET['id'];

// Ambil data transaksi
$data = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi='$id'");
$d = mysqli_fetch_assoc($data);

// Ambil data pelanggan untuk dropdown
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");

// Jika tombol update ditekan
if(isset($_POST['update'])){

    $id_pelanggan = $_POST['id_pelanggan'];

    mysqli_query($conn, "
        UPDATE transaksi 
        SET id_pelanggan='$id_pelanggan'
        WHERE id_transaksi='$id'
    ");

    echo "<script>
        alert('Transaksi berhasil diupdate!');
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
    background: #3498db;
    color: white;
    border: none;
    border-radius: 5px;
}
</style>

<div class="card">
    <h3>Edit Transaksi</h3>

    <form method="POST">

        <label>Tanggal</label>
        <input type="text" value="<?= $d['tanggal']; ?>" readonly>

        <label>Pelanggan</label>
        <select name="id_pelanggan" required>
            <?php while($p = mysqli_fetch_assoc($pelanggan)) : ?>
                <option value="<?= $p['id_pelanggan']; ?>"
                    <?= $p['id_pelanggan'] == $d['id_pelanggan'] ? 'selected' : ''; ?>>
                    <?= $p['nama_pelanggan']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <label>Total</label>
        <input type="text" value="Rp<?= number_format($d['total_harga']); ?>" readonly>

        <button type="submit" name="update">Update</button>
    </form>
</div>
