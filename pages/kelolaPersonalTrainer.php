<?php
// Contoh data personal trainer (seharusnya ini berasal dari database)
$personal_trainers = [
    ['id_pt' => 'PT001', 'nama_lengkap' => 'John Doe', 'alamat' => 'Jl. Sejahtera No. 123', 'no_handphone' => '082134567890'],
    ['id_pt' => 'PT002', 'nama_lengkap' => 'Jane Smith', 'alamat' => 'Jl. Maju Bersama No. 456', 'no_handphone' => '085612345678'],
    ['id_pt' => 'PT003', 'nama_lengkap' => 'Mike Johnson', 'alamat' => 'Jl. Kebon Raya No. 789', 'no_handphone' => '089876543210'],
    // Tambahkan data lainnya jika diperlukan
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Personal Trainer</title>
    <!-- Link ke CDN Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Pengelolaan Personal Trainer</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID PT</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Handphone</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Menampilkan data PT dengan nomor urut
                $no = 1;
                foreach ($personal_trainers as $trainer) {
                    echo "<tr>
                            <td>$no</td>
                            <td>{$trainer['id_pt']}</td>
                            <td>{$trainer['nama_lengkap']}</td>
                            <td>{$trainer['alamat']}</td>
                            <td>{$trainer['no_handphone']}</td>
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
