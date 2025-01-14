<?php

include "../koneksi.php";

if (isset($_GET['id'])) {

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    date_default_timezone_set('Asia/Jakarta');

    // Membuat format tanggal dan waktu saat ini
    $tanggal_waktu = date('Y-m-d H:i:s');
    $tanggal = date('Y-m-d');
    $query = "UPDATE catatan_kunjungan SET waktu_kunjungan_keluar = '$tanggal_waktu' WHERE id_kunjungan = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: ../index.php?page=kedatangan");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

} else {
    die("akses dilarang...");
}

?>