<?php
// Contoh data pengunjung (seharusnya ini berasal dari database)
$pengunjung = [
    ['id_pengunjung' => 'PG001', 'nama_lengkap' => 'Andi Wijaya', 'alamat' => 'Jl. Merdeka No. 10', 'no_hp' => '081234567890', 'nama_jenis_pengunjung' => 'Member', 'status' => 'Aktif', 'nama_pt' => 'John Doe'],
    ['id_pengunjung' => 'PG002', 'nama_lengkap' => 'Siti Nurhaliza', 'alamat' => 'Jl. Raya No. 15', 'no_hp' => '082345678901', 'nama_jenis_pengunjung' => 'Non-Member', 'status' => 'Tidak Aktif', 'nama_pt' => 'Jane Smith'],
    ['id_pengunjung' => 'PG003', 'nama_lengkap' => 'Budi Santoso', 'alamat' => 'Jl. Alam No. 20', 'no_hp' => '085612345678', 'nama_jenis_pengunjung' => 'Member', 'status' => 'Aktif', 'nama_pt' => 'Mike Johnson'],
    // Tambahkan data lainnya jika diperlukan
];
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
                    <th scope="col">Nama PT</th>
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
                            <td>{$v['nama_pt']}</td>
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
