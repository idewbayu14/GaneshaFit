<?php
include 'koneksi.php'; // Termasuk file koneksi

// Query untuk mengambil data pengunjung dan personal trainer dengan alias untuk nama_lengkap
$query = "SELECT pengunjung.*, personal_trainer.nama_lengkap AS nama_pt
          FROM pengunjung 
          LEFT JOIN personal_trainer ON pengunjung.id_pt = personal_trainer.id_pt";  // Mengambil nama personal trainer

$result = $conn->query($query);

// Cek apakah data ditemukan
if ($result->num_rows > 0) {
    // Simpan data dalam array
    $pengunjung = [];
    while ($row = $result->fetch_assoc()) {
        $pengunjung[] = $row;
    }
} else {
    $pengunjung = [];
}

$conn->close(); // Tutup koneksi database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Pengunjung</title>
    <!-- Link ke CDN Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Pengelolaan Pengunjung</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Pengunjung</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Jenis Pengunjung</th>
                    <th scope="col">Status</th>
                    <th scope="col">Nama PT</th>  <!-- Nama Personal Trainer -->
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data pengunjung dengan nomor urut
                $no = 1;
                foreach ($pengunjung as $v) {
                    echo "<tr>
                            <td>$no</td>
                            <td>{$v['id_pengunjung']}</td>
                            <td>{$v['nama_lengkap']}</td>
                            <td>{$v['alamat']}</td>
                            <td>{$v['no_hp']}</td>
                            <td>{$v['nama_jenis_pengunjung']}</td>
                            <td>{$v['status']}</td>
                            <td>{$v['nama_pt']}</td>  <!-- Nama PT -->
                            <td>
                                <button class='btn btn-warning btn-sm'>Edit</button>
                                <button class='btn btn-danger btn-sm'>Hapus</button>
                            </td>
                          </tr>";
                    $no++; // Increment nomor urut
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Link ke JS Bootstrap dan Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
