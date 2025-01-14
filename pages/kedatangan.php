<?php

include 'koneksi.php';
$id_petugas = $_SESSION['id_petugas'];
function buatIdKunjungan($prefix, $length = 8)
{
  $timestamp = date('YmdHis');

  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, strlen($characters) - 1)];
  }

  $idKunjungan = $prefix . $timestamp . $randomString;

  return $idKunjungan;
}
if (isset($_POST['masuk'])) {

  date_default_timezone_set('Asia/Jakarta');

  // Membuat format tanggal dan waktu saat ini
  $tanggal_waktu = date('Y-m-d H:i:s');
  $tanggal = date('Y-m-d');

  $id_pengunjung = null;

  if (!empty($_POST['id_pengunjung_masuk'])) {
    $id_pengunjung = $_POST['id_pengunjung_masuk'];
    $query = "SELECT * FROM pengunjung WHERE id_pengunjung = '$id_pengunjung'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_assoc($result);
      $nama_lengkap = $row['nama_lengkap'];
      $id_pengunjung = $row['id_pengunjung'];
      $masa_berlaku = $row['masa_berlaku'];


      if ($tanggal < $masa_berlaku) {
        ?>

        <script>
          showNotification('Sukses', 'success', 'Pengunjung <?php echo "$nama_lengkap"; ?> sudah masuk');
        </script>
        <?php

        $prefix = 'KJ_';
        $idKunjungan = buatIdKunjungan($prefix);

        $new_query = "INSERT INTO `catatan_kunjungan` (`id_kunjungan`, `id_pengunjung`, `id_petugas`, `waktu_kunjungan_masuk`, `waktu_kunjungan_keluar`, `tanggal`) VALUES ('$idKunjungan', '$id_pengunjung', '$id_petugas', '$tanggal_waktu', NULL, '$tanggal');";
        mysqli_query($conn, $new_query);

      } else {

        ?>
        <script>
          showNotification('Pengunjung sudah expire', 'danger', 'Pengunjung tidak bisa masuk harus mendaftar lagi');
        </script>
        <?php

      }

    } else {
      ?>

      <script>
        showNotification('Gagal', 'danger', 'Data pengunjung tidak ditemukan');
      </script>

      <?php
    }
  }
}


?>



<h3 class="fw-bold mb-3">Kedatangan <i class="fas fa-check-circle" style="color: tomato"></i></h3>
<h6 class="op-7 mb-2">Halaman Masuk dan Keluar pengunjung</h6>

<div class="card">
  <form method="POST" action="index.php?page=kedatangan">
    <div class="form-group">
      <div class="input-icon">
        <span class="input-icon-addon">
          <i class="fa fa-user"></i>
        </span>
        <input type="text" class="form-control" name="id_pengunjung_masuk" placeholder="Masukan id pengunjung" />
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary" name="masuk">
        Masuk
      </button>
    </div>
  </form>

</div>

<div class="card">
  <div class="card-header">
    <div class="card-title">Pengunjung yang datang</div>
  </div>

  <?php
  $sql ="
    SELECT 
        pengunjung.id_pengunjung, 
        catatan_kunjungan.id_kunjungan,
        pengunjung.nama_lengkap, 
        catatan_kunjungan.waktu_kunjungan_masuk,
        catatan_kunjungan.waktu_kunjungan_keluar
    FROM 
        pengunjung
    JOIN 
        catatan_kunjungan ON pengunjung.id_pengunjung = catatan_kunjungan.id_pengunjung
    WHERE
        catatan_kunjungan.waktu_kunjungan_keluar IS NULL;
    ";
  $result = $conn->query($sql);

  $rows = array();
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $rows[] = $row;
    }
  }

  function fd($id_kunjungan)
  {
    echo "$id_kunjungan";
  }

  if (isset($_POST['keluar']) && isset($_POST['id_pengunjung'])) {
    $id_pengunjung = $_POST['id_pengunjung'];
    
  }
  ?>

  <div class="card-body">
    <table class="table table-striped mt-3">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Id Pengunjung</th>
          <th scope="col">Nama Lengkap</th>
          <th scope="col">Waktu Masuk</th>
          <th scope="col">Tombol Keluar</th>
        </tr>
      </thead>
      <form action="backend/checkout.php" method="post">
        <tbody>
          <?php
          if (count($rows) > 0) {
            $no = 1;
            for ($i = 0; $i < count($rows); $i++) {
              $row = $rows[$i];
              if ($row["waktu_kunjungan_keluar"] == null) {
                echo '<tr>';
                echo '<td>' . $no . '</td>';
                echo '<td>' . $row["id_pengunjung"] . '</td>';
                echo '<td>' . $row["nama_lengkap"] . '</td>';
                echo '<td>' . $row["waktu_kunjungan_masuk"] . '</td>';
                echo "<td><a href='backend/checkout.php?id=".$row["id_kunjungan"]."' class='btn btn-danger'>Keluar</a></td>'";
                echo '</tr>';
                $no++;
              }
            }
          } else {
            echo '<tr><td colspan="6"><center>Tidak ada data</center></td></tr>';
          }
          ?>
        </tbody>
      </form>

    </table>
  </div>
</div>