<?php

include '../koneksi.php';


if (isset($_POST['id_pengunjung'])){
    $id_pengunjung = $_POST['id_pengunjung'];
    $query = "SELECT * FROM pengunjung WHERE id_pengunjung = '$id_pengunjung'";


    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }else{
        echo json_encode(['error' => 'Pengunjung tidak ditemukan']);
    }
}