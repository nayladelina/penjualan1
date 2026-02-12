<?php
include 'koneksi.php';

$data = mysqli_query($conn, "
    SELECT transaksi.*, pelanggan.nama_pelanggan 
    FROM transaksi
    JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan
    ORDER BY transaksi.id_transaksi DESC
");
?>

<style>
.card {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.btn {
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    font-size: 14px;
}

.btn-success { background: #27ae60; }
.btn-primary { background: #3498db; }
.btn-danger { background: #e74c3c; }

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #2c3e50;
    color: white;
    padding: 10px;
}

td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

tr:hover {
    background: #f2f2f2;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>Data Transaksi</h3>
        <a href="dashboard.php?page=tambah_transaksi" class="btn btn-success">
            + Tambah Transaksi
        </a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php while($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['tanggal']; ?></td>
            <td><?= $row['nama_pelanggan']; ?></td>
            <td>Rp<?= number_format($row['total_harga']); ?></td>
            <td>
                <a href="dashboard.php?page=edit_transaksi&id=<?= $row['id_transaksi']; ?>" 
                   class="btn btn-primary">Edit</a>

                <a href="pages/hapus_transaksi.php?id=<?= $row['id_transaksi']; ?>" 
                   class="btn btn-danger"
                   onclick="return confirm('Yakin ingin hapus?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
