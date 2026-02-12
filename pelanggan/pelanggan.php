<?php
include __DIR__ . '/../koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM pelanggan");
?>

<style>
.card {
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.08);
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
    transition: 0.3s;
}

.btn-success { background: #27ae60; }
.btn-success:hover { background: #219150; }

.btn-primary { background: #3498db; }
.btn-primary:hover { background: #2980b9; }

.btn-danger { background: #e74c3c; }
.btn-danger:hover { background: #c0392b; }

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #2c3e50;
    color: white;
    padding: 12px;
    text-align: center;
}

td {
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background: #f2f2f2;
}
</style>

<div class="card">
    <div class="card-header">
        <h3>Data Pelanggan</h3>
        <a href="dashboard.php?page=tambah_pelanggan" class="btn btn-success">+ Tambah</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php while($row = mysqli_fetch_assoc($data)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['kode_pelanggan']; ?></td>
            <td><?= $row['nama_pelanggan']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td><?= $row['no_hp']; ?></td>
            <td><?= $row['email']; ?></td>
            <td>
                <a href="dashboard.php?page=edit_pelanggan&id=<?= $row['id_pelanggan']; ?>" class="btn btn-primary">Edit</a>
                <a href="pelanggan/hapus_pelanggan.php?id=<?= $row['id_pelanggan']; ?>"
                   class="btn btn-danger"
                   onclick="return confirm('Yakin ingin hapus?')">
                   Hapus
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
