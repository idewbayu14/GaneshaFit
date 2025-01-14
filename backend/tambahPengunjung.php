<?php

include "../koneksi.php";

if (!empty($_POST['id_pengunjung_pendaftaran'])) {
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $jenis_pengunjung = mysqli_real_escape_string($conn, $_POST['value']);
    $tgl_bergabung = mysqli_real_escape_string($conn, $_POST['tgl_bergabung']);
    $masa_berlaku = mysqli_real_escape_string($conn, $_POST['masa_berlaku']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $id_pengunjung = mysqli_real_escape_string($conn, $_POST['id_pengunjung_pendaftaran']);

    // Tangani pilihan personal trainer
    $personal_trainer = $_POST['personal_trainer'];
    $id_pt = NULL; // Default NULL jika tidak menggunakan PT

    if ($personal_trainer === 'gunakan' && !empty($_POST['id_pt'])) {
        $id_pt = mysqli_real_escape_string($conn, $_POST['id_pt']);
    }

    // Simpan data ke tabel pengunjung
    $query = "INSERT INTO pengunjung (id_pengunjung, nama_lengkap, no_hp, alamat, nama_jenis_pengunjung, tgl_bergabung, masa_berlaku, biaya, id_pt)
              VALUES ('$id_pengunjung','$nama_lengkap', '$no_hp', '$alamat', '$jenis_pengunjung', '$tgl_bergabung', '$masa_berlaku', '$amount', '$id_pt')";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, simpan juga ke tabel catatan_kunjungan
        $id_kunjungan = "KJ_" . date("YmdHis") . bin2hex(random_bytes(4));
        $id_petugas = "PG01"; // ID petugas default
        $queryKunjungan = "INSERT INTO catatan_kunjungan (id_kunjungan, id_pengunjung, id_petugas, waktu_kunjungan_masuk, tanggal, id_pt) 
                           VALUES ('$id_kunjungan', '$id_pengunjung', '$id_petugas', NOW(), CURDATE(), '$id_pt')";

        if (mysqli_query($conn, $queryKunjungan)) {
            header("Location: ../index.php?page=pendaftaran&status=success");
        } else {
            error_log("Query Error (catatan_kunjungan): " . mysqli_error($conn), 3, "../error.log");
            echo "Error: " . $queryKunjungan . "<br>" . mysqli_error($conn);
        }
    } else {
        error_log("Query Error (pengunjung): " . mysqli_error($conn), 3, "../error.log");
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} else {
    header("Location: ../index.php?page=pendaftaran&status=error");
}
