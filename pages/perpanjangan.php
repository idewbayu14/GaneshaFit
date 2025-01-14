<?php

include 'koneksi.php';
$nama = '';
$no_handphone = '';
$masa_berlaku_sebelum = '';



if (isset($_POST['cari'])) {

  if (!empty($_POST['id_pengunjung'])) {
    $id_pengunjung = $_POST['id_pengunjung'];
    $query = "SELECT * FROM pengunjung WHERE id_pengunjung = '$id_pengunjung'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      $pengunjung = mysqli_fetch_assoc($result);
      $nama = $pengunjung['nama_lengkap'];
      $no_handphone = $pengunjung['no_hp'];
      $masa_berlaku_sebelum = $pengunjung['masa_berlaku'];
    } else {
      ?>
      <script>
        showNotification('Id Pengunjung Tidak ada', 'danger', 'Id pengunjung tidak ditemukan');
      </script>
      <?php
    }

  } else {
    ?>

    <script>
      showNotification('Id Pengunjung kosong', 'danger', 'Harap isi id pengunjung');
    </script>

    <?php
  }
}


?>


<h3 class="fw-bold mb-3">Perpanjangan <i class="fas fa-calendar-alt" style="color: tomato"></i></h3>
<h6 class="op-7 mb-2">Perpanjangan pengunjung GYM</h6>

<form method="post" action="index.php?page=perpanjangan">
  <div class="card">
    <div class="row row-grid">
      <div class="col-12 col-md-8">
        <div class="form-group">
          <div class="input-icon">
            <span class="input-icon-addon">
              <i class="fa fa-user"></i>
            </span>
            <input type="text" class="form-control" name="id_pengunjung" placeholder="Masukan id pengunjung" />
          </div>
        </div>
      </div>
      <div class="col-6 col-md-1">
        <div class="form-group">
          <button type="submit" class="btn btn-icon btn-round btn-black" id="cari" name="cari">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="form-group">
      <input type="hidden" name="id_pengunjung_new" value="<?php echo $id_pengunjung; ?>" />
      <label for="nama_lengkap">Nama Lengkap</label>
      <input type="text" class="form-control" id="nama_lengkap" placeholder="Masukan nama lengkap"
        value="<?php echo $nama; ?>" readonly />
    </div>
    <div class="form-group">
      <label for="no_hp">No Handphone</label>
      <input type="text" class="form-control" id="no_hp" placeholder="Masukan No handphone"
        value="<?php echo $no_handphone; ?>" readonly />
    </div>
  </div>

  <input type="hidden" name="tanggal_awal" id="tanggal_awal" value="<?php echo $masa_berlaku_sebelum; ?>" />

  <div class="card">

  <div class="form-group">
      <label>Personal Trainer</label><br />
      <div class="d-flex">
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="personal_trainer"
            id="flexRadioDefault1"
            value="gunakan"
            onclick="toggleTrainerDropdown(true)"
          />
          <label class="form-check-label" for="flexRadioDefault1">
            Gunakan
          </label>
        </div>
        <div class="form-check">
          <input
            class="form-check-input"
            type="radio"
            name="personal_trainer"
            id="flexRadioDefault2"
            value="tidak"
            checked
            onclick="toggleTrainerDropdown(false)"
          />
          <label class="form-check-label" for="flexRadioDefault2">
            Tidak
          </label>
        </div>
      </div>

      <!-- Dropdown untuk memilih personal trainer -->
      <div class="mt-3" id="trainerDropdown" style="display: none;">
        <label for="id_pt">Pilih Personal Trainer</label>
        <select class="form-control" id="id_pt" name="id_pt">
          <option value="PT01">Rusdi (PT01)</option>
          <option value="PT02">Rusman (PT02)</option>
        </select>
      </div>
    </div>

  

    <div class="form-group">
      <label for="defaultSelect">Lama perpanjangan</label>
      <select class="form-select form-control" id="jumlah_bulan" name="jumlah_bulan">
        <option value="1">1 bulan</option>
        <option value="2">2 bulan</option>
        <option value="3">3 bulan</option>
        <option value="4">4 bulan</option>
        <option value="5">5 bulan</option>
        <option value="6">6 bulan</option>
        <option value="7">7 bulan</option>
        <option value="8">8 bulan</option>
        <option value="9">9 bulan</option>
        <option value="10">10 bulan</option>
        <option value="11">11 bulan</option>
        <option value="12">12 bulan</option>
      </select>
    </div>
    <div class="form-group">
      <label for="masa_berlaku">Masa Berlaku</label>
      <input type="text" class="form-control" id="masa_berlaku" placeholder="Masa berlaku" name="tanggal_baru"
        value="<?php echo $masa_berlaku_sebelum; ?>" readonly />
    </div>
    <div class="form-group">
      <label for="biaya">Biaya</label>
      <div class="input-group mb-3">
        <span class="input-group-text">Rp</span>
        <input type="text" class="form-control" id="biaya" aria-label="Total (Rupiah)" name="total" value="150000" readonly />
        <span class="input-group-text">,00</span>
      </div>
    </div>

    <div class="card-body">
      <p class="demo">
        <button class="btn btn-primary" name="perpanjang">Perpanjang</button>
      </p>
    </div>
  </div>
</form>

<?php
if (isset($_POST['perpanjang'])) {
  $tanggal_baru = $_POST['tanggal_baru'];
  $id_pengunjung = $_POST['id_pengunjung_new'];
  $id_pt = isset($_POST['id_pt']) ? $_POST['id_pt'] : NULL; // Tangkap ID personal trainer
  $biaya = $_POST['total'];

  if (empty($id_pengunjung)) {
    echo '<script>showNotification("Gagal", "danger", "ID Pengunjung tidak boleh kosong")</script>';
  } else {
    if (!empty($tanggal_baru)) {
      // Query untuk memperbarui data pengunjung
      $query = "UPDATE pengunjung 
                SET masa_berlaku = '$tanggal_baru', 
                    biaya = '$biaya', 
                    id_pt = " . ($id_pt ? "'$id_pt'" : "NULL") . " 
                WHERE id_pengunjung = '$id_pengunjung';";

      if (mysqli_query($conn, $query)) {
        echo '<script>showNotification("Berhasil", "success", "Berhasil perpanjangan")</script>';
      } else {
        echo '<script>showNotification("Gagal", "danger", "Perpanjangan gagal: ' . mysqli_error($conn) . '")</script>';
      }
    } else {
      echo '<script>showNotification("Gagal", "danger", "Perpanjangan gagal: Tanggal baru kosong")</script>';
    }
  }
}

?>

<script>
  document.getElementById('jumlah_bulan').addEventListener('change', function () {
    const jumlahBulan = parseInt(this.value);
    const biayaPerBulan = 150000; // Biaya per bulan

    // Hitung total biaya
    const totalBiaya = jumlahBulan * biayaPerBulan;

    // Tampilkan total biaya di input biaya
    document.getElementById('biaya').value = totalBiaya;

    // Update masa berlaku seperti yang sebelumnya
    const masaBerlakuSebelum = document.getElementById('tanggal_awal').value;
    const tanggalBaru = new Date(masaBerlakuSebelum);
    tanggalBaru.setMonth(tanggalBaru.getMonth() + jumlahBulan);
    const formattedDate = tanggalBaru.toISOString().split('T')[0];
    document.getElementById('masa_berlaku').value = formattedDate;
  });
</script>