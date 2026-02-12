<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM pelanggan WHERE id_pelanggan='$id'");
$d = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {

    $kode = $_POST['kode_pelanggan'];
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE pelanggan SET 
        kode_pelanggan='$kode',
        nama_pelanggan='$nama',
        alamat='$alamat',
        no_hp='$no_hp',
        email='$email'
        WHERE id_pelanggan='$id'
    ");

    header("Location: dashboard.php?page=customer");
}
?>

<style>
input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}
button {
    padding: 8px 15px;
    background: #3498db;
    border: none;
    color: white;
    border-radius: 5px;
}
</style>

<h3>Edit Pelanggan</h3>

<form method="POST">
    <label>Kode Pelanggan</label>
    <input type="text" name="kode_pelanggan" value="<?= $d['kode_pelanggan']; ?>" required>

    <label>Nama Pelanggan</label>
    <input type="text" name="nama_pelanggan" value="<?= $d['nama_pelanggan']; ?>" required>

    <label>Alamat</label>
    <input type="text" name="alamat" value="<?= $d['alamat']; ?>" required>

    <label>No HP</label>
    <input type="text" name="no_hp" value="<?= $d['no_hp']; ?>" required>

    <label>Email</label>
    <input type="email" name="email" value="<?= $d['email']; ?>" required>

    <button type="submit" name="update">Update</button>
</form>
