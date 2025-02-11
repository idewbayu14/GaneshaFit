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
    <style>
        table {
            width: 100%;
            table-layout: auto; /* Membuat tabel dapat menyesuaikan ukuran dengan isi */
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            width: 150px;
        }
    </style>
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
                                <button class='btn btn-warning btn-sm edit-btn' 
                                    data-id='{$v['id_pengunjung']}'
                                    data-nama='{$v['nama_lengkap']}'
                                    data-alamat='{$v['alamat']}'
                                    data-hp='{$v['no_hp']}'
                                    data-jenis='{$v['nama_jenis_pengunjung']}'
                                    data-status='{$v['status']}'
                                    data-pt='{$v['nama_pt']}'>
                                    Edit
                                </button>
                                <form method='POST' class='d-inline' onsubmit='return confirm(\"Apakah Anda yakin ingin menghapus pengunjung ini?\");'>
                                    <input type='hidden' name='delete' value='1'>
                                    <input type='hidden' name='id_pengunjung' value='{$v['id_pengunjung']}'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Hapus</button>
                                </form>
                            </td>
                          </tr>";
                    $no++; // Increment nomor urut
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Edit Pengunjung -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pengunjung</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="update" value="1">
                        <input type="hidden" name="id_pengunjung" id="id_pengunjung">
                        <div class="form-group">
                            <label>ID Pengunjung</label>
                            <input type="text" class="form-control" id="id_pt" name="id_pt" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label>No Handphone</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pengunjung</label>
                            <input type="text" class="form-control" id="jenis_pengunjung" name="jenis_pengunjung" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                        <div class="form-group">
                            <label>Nama PT</label>
                            <input type="text" class="form-control" id="nama_pt" name="nama_pt" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('id_pengunjung').value = this.getAttribute('data-id');
                document.getElementById('nama_lengkap').value = this.getAttribute('data-nama');
                document.getElementById('alamat').value = this.getAttribute('data-alamat');
                document.getElementById('no_hp').value = this.getAttribute('data-hp');
                document.getElementById('jenis_pengunjung').value = this.getAttribute('data-jenis');
                document.getElementById('status').value = this.getAttribute('data-status');
                document.getElementById('nama_pt').value = this.getAttribute('data-pt');
                $('#editModal').modal('show');
            });
        });
    </script>

    <!-- Link ke JS Bootstrap dan Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
