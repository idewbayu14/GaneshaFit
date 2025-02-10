<?php
include 'koneksi.php'; // Termasuk file koneksi

// Handle insert data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create'])) {
    $id_pt = uniqid("PT");
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $no_handphone = $_POST['no_handphone'];

    $query = "INSERT INTO personal_trainer (id_pt, nama_lengkap, alamat, no_handphone) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $id_pt, $nama_lengkap, $alamat, $no_handphone);
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href = window.location.href;</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menambahkan data!');</script>";
    }
}

// Handle update data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id_pt = $_POST['id_pt'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $no_handphone = $_POST['no_handphone'];

    $query = "UPDATE personal_trainer SET nama_lengkap = ?, alamat = ?, no_handphone = ? WHERE id_pt = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $nama_lengkap, $alamat, $no_handphone, $id_pt);
    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location.href = window.location.href;</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui data!');</script>";
    }
}



// Handle delete data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {
    $id_pt = $_POST['id_pt'];
    $query = "DELETE FROM personal_trainer WHERE id_pt = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $id_pt);
    $stmt->execute();
}

// Query untuk mengambil data personal trainer dari database
$query = "SELECT * FROM personal_trainer";
$result = $conn->query($query);
$personal_trainers = $result->num_rows > 0 ? $result->fetch_all(MYSQLI_ASSOC) : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Personal Trainer</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Pengelolaan Personal Trainer</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>ID PT</th>
                        <th>Nama Lengkap</th>
                        <th>Alamat</th>
                        <th>No Handphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($personal_trainers as $trainer): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $trainer['id_pt'] ?></td>
                            <td><?= $trainer['nama_lengkap'] ?></td>
                            <td><?= $trainer['alamat'] ?></td>
                            <td><?= $trainer['no_handphone'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn" 
                                    data-id="<?= $trainer['id_pt'] ?>"
                                    data-nama="<?= $trainer['nama_lengkap'] ?>"
                                    data-alamat="<?= $trainer['alamat'] ?>"
                                    data-hp="<?= $trainer['no_handphone'] ?>">
                                    Edit
                                </button>
                                <form method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus personal trainer ini?');">
                                    <input type="hidden" name="delete" value="1">
                                    <input type="hidden" name="id_pt" value="<?= $trainer['id_pt'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> <!-- Tambahkan penutup div -->

        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createModal">Create Personal Trainer</button>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Personal Trainer</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="update" value="1">
                        <div class="form-group">
                            <label>ID PT</label>
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
                            <input type="text" class="form-control" id="no_handphone" name="no_handphone" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create Personal Trainer</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="create" value="1">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label>No Handphone</label>
                            <input type="text" class="form-control" name="no_handphone" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('id_pt').value = this.getAttribute('data-id');
                document.getElementById('nama_lengkap').value = this.getAttribute('data-nama');
                document.getElementById('alamat').value = this.getAttribute('data-alamat');
                document.getElementById('no_handphone').value = this.getAttribute('data-hp');
                $('#editModal').modal('show');
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
