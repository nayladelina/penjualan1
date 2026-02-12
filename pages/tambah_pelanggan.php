<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $kode = $_POST['kode_pelanggan'];
    $nama = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    mysqli_query($conn, "INSERT INTO pelanggan 
        (kode_pelanggan, nama_pelanggan, alamat, no_hp, email)
        VALUES ('$kode','$nama','$alamat','$no_hp','$email')
    ");

    header("Location: dashboard.php?page=customer");
}
?>

<style>
.card {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

.card h3 {
    margin-bottom: 25px;
}

.form-group {
    margin-bottom: 18px;
}

label {
    font-weight: 500;
    display: block;
    margin-bottom: 6px;
}

input {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ddd;
    font-size: 14px;
}

input:focus {
    border-color: #3498db;
    outline: none;
}

.button-group {
    margin-top: 20px;
}

.btn {
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    border: none;
    cursor: pointer;
    color: white;
}

.btn-save {
    background: #27ae60;
}

.btn-save:hover {
    background: #219150;
}

.btn-back {
    background: #95a5a6;
}

.btn-back:hover {
    background: #7f8c8d;
}
</style>

<div class="card">
    <h3>Tambah Pelanggan</h3>

    <form method="POST">

        <div class="form-group">
            <label>Kode Pelanggan</label>
            <input type="text" name="kode_pelanggan" required>
        </div>

        <div class="form-group">
            <label>Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" required>
        </div>

        <div class="form-group">
            <label>Alamat</label>
            <input type="text" name="alamat" required>
        </div>

        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="button-group">
            <button type="submit" name="simpan" class="btn btn-save">Simpan</button>
            <a href="dashboard.php?page=customer" class="btn btn-back">Kembali</a>
        </div>

    </form>
</div>
