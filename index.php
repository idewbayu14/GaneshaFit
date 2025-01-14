<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['id_petugas'])) {
  header("Location: pages/login.php");
  exit();
}
$id_petugas = $_SESSION['id_petugas'];
$nama_lengkap = $_SESSION['nama_lengkap'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>GaneshaFit</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="icon" href="assets/img/logo_barbel.png" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["assets/css/fonts.min.css"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/plugins.min.css" />
  <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery-3.7.1.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>

  <!-- jQuery Scrollbar -->
  <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

  <!-- Chart JS -->
  <script src="assets/js/plugin/chart.js/chart.min.js"></script>

  <!-- jQuery Sparkline -->
  <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

  <!-- Chart Circle -->
  <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

  <!-- Datatables -->
  <script src="assets/js/plugin/datatables/datatables.min.js"></script>

  <!-- Bootstrap Notify -->
  <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

  <!-- jQuery Vector Maps -->
  <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
  <script src="assets/js/plugin/jsvectormap/world.js"></script>

  <!-- Sweet Alert -->
  <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

  <!-- Kaiadmin JS -->
  <script src="assets/js/kaiadmin.min.js"></script>





  <script>
    function showNotification(title, type, message) {
      $.notify({
        icon: 'icon-bell',
        title: title,
        message: message,
      }, {
        type: type,
        placement: {
          from: "bottom",
          align: "right"
        },
        time: 1000,
      });
    }

    // Memanggil showNotification jika status sukses ada di URL
    $(document).ready(function () {
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('status') === 'success') {
        showNotification('Pendaftaran berhasil', 'success', 'pendaftaran berhasil, silahkan lakukan checkin');
      }else if (urlParams.get('status') === 'error') {
        showNotification('Pendaftaran gagal', 'danger', 'pendaftaran gagal, silahkan coba lagi');
      }
    });
  </script>



  <script>
    $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
      type: "line",
      height: "70",
      width: "100%",
      lineWidth: "2",
      lineColor: "#177dff",
      fillColor: "rgba(23, 125, 255, 0.14)",
    });

    $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
      type: "line",
      height: "70",
      width: "100%",
      lineWidth: "2",
      lineColor: "#f3545d",
      fillColor: "rgba(243, 84, 93, .14)",
    });

    $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
      type: "line",
      height: "70",
      width: "100%",
      lineWidth: "2",
      lineColor: "#ffa534",
      fillColor: "rgba(255, 165, 52, .14)",
    });
  </script>

</head>

<body>
  <div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo" data-background-color="blue2">
        <!-- Logo Header -->
        <div class="logo-header" style="background-color: #3067d3;">
          <a href="index.php" class="logo">
            <img src="assets/img/kaiadmin/logo.png" alt="navbar brand" class="navbar-brand" height="20" />
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right" style="color:white"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <li class="nav-item">
              <a href="index.php">
                <i class="fas fa-home"></i>
                <p>Beranda</p>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">---List Menu---</h4>
            </li>
            <li class="nav-item">
              <a href="index.php?page=pendaftaran">
                <i class="fas fa-user"></i>
                <p>Pendaftaran</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?page=kedatangan">
                <i class="fas fa-check"></i>
                <p>Kedatangan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?page=perpanjangan">
                <i class="fas fa-calendar"></i>
                <p>Perpanjangan</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?page=laporan">
                <i class="fas fa-file"></i>
                <p>Laporan</p>
              </a>
            </li>
            <li class="nav-item mt-5 text-center"
              style="margin-top: auto; margin-bottom: 20px; width: 100%; position: absolute; bottom: 80px;">
              <button class="btn btn-danger" id="logoutButton">
                <span class="btn-label">
                  <i class="icon-logout"></i>
                </span>
                Logout
              </button>
            </li>

            <script>
              document.getElementById('logoutButton').addEventListener('click', function () {
                window.location.href = 'pages/logout.php';
              });
            </script>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- End Sidebar -->
    <?php

    // menghitung total pengunjung harian
    $query_hari_ini = "SELECT *
      FROM catatan_kunjungan
      WHERE waktu_kunjungan_keluar is NULL";
    $result_hari_ini = mysqli_query($conn, $query_hari_ini);

    $hari_ini = mysqli_num_rows($result_hari_ini);

    // menghitung total pengunjung bulanan
    $query_bulanan = "SELECT * 
                  FROM pengunjung
                  WHERE nama_jenis_pengunjung = 'bulanan'";
    $result_bulanan = mysqli_query($conn, $query_bulanan);

    $bulanan = mysqli_num_rows($result_bulanan);
    ?>

    <div class="main-panel">
      <div class="main-header" style="background-color: #3067d3;">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="blue2">
            <a href="index.html" class="logo">

            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
          <div class="container-fluid">
            <nav class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
              <div>
                <p id="currentDate" style="margin-top: 15px; color:white"></p>
                <script>
                  const today = new Date();

                  const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                  const dayName = days[today.getDay()];

                  const date = today.getDate();
                  const month = today.getMonth() + 1;
                  const year = today.getFullYear();

                  const formattedDate = `${dayName}, ${date}/${month}/${year}`;

                  document.getElementById('currentDate').innerText = formattedDate;


                </script>
              </div>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
              <li class="nav-item topbar-user dropdown hidden-caret">
                <div class="dropdown-toggle profile-pic">
                  <div class="avatar-sm">
                    <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle" />
                  </div>
                  <span class="profile-username">
                    <span class="op-7" style="color: white">👋 Halo ,</span>
                    <span class="fw-bold" style="color: white"><?php echo $nama_lengkap; ?></span>
                  </span>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>

      <div class="container">
        <div class="page-inner" id="page-inner">
          <?php
          if (isset($_GET['page'])) {
            $page = $_GET['page'];

            switch ($page) {
              case 'pendaftaran':
                include 'pages/pendaftaran.php';
                break;
              case 'kedatangan':
                include 'pages/kedatangan.php';
                break;
              case 'perpanjangan':
                include 'pages/perpanjangan.php';
                break;
              case 'laporan':
                include 'pages/laporan.php';

                break;
            }

          } else {
            echo '<div class="page-inner" id="page-inner">
              <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Beranda <i class="fas fa-home" style="color: tomato"></i></h3>
                <h6 class="op-7 mb-2">Selamat datang di halaman Beranda</h6>
              </div>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="index.php?page=pendaftaran" class="btn btn-primary btn-round">Tambah Pengunjung</a>
              </div>
            </div>
            
              
                
                <div class="card card-primary bg-primary-gradient">
                  <div class="card-body curves-shadow">
                    <h1>' . $hari_ini . '</h1>
                    <h5 class="op-8">Pengunjung Aktif</h5>
                    <div class="pull-right">
                      <h3 class="fw-bold op-8"></h3>
                    </div>
                  </div>
                </div>
                  
                <div class="card card-primary bg-primary-gradient">
                  <div class="card-body bubble-shadow">
                    <h1>' . $bulanan . '</h1>
                    <h5 class="op-8">Pengunjung Bulanan</h5>
                    <div class="pull-right">
                      <h3 class="fw-bold op-8"></h3>
                    </div>
                  </div>
                </div>
              
                <div class="card">
								<div class="card-header">
									<h4 class="card-title">Ganesha GYM</h4>
								</div>
								<div class="card-body">
									<ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Tentang</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Kontak</a>
										</li>
									</ul>
									<div class="tab-content mt-2 mb-3" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
											<p>Gym ini menjadi pilihan utama bagi masyarakat sekitar yang ingin menjaga kebugaran dan kesehatan mereka. Selain harga untuk menjadi membernya murah, Ganesha Gym banyak disenangi dari mulai anak SMA, yang sudah berkuliah hingga orang-orang yang sudah bekerja memilih untuk melakukan aktivitas gym di Ganesha Gym.</p>
										</div>
										<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
											<p>Jl. Aceh No.50, Merdeka, Kec. Sumur Bandung, Kota Bandung, Jawa Barat 40111.</p>
										</div>
										<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
											<p>+62 897-7233-000 (Admin)</p>
										</div>
									</div>
								</div>
							</div>
            
  
            </div>';
          }
          ?>


        </div>

      </div>

      <footer class="footer">
        <div class="container-fluid d-flex justify-content-between">
          <div class="copyright">
            2024, made with by
            <a href="https://www.instagram.com/hakip_/?utm_source=ig_web_button_share_sheet">5 Trio</a>
          </div>
        </div>
      </footer>
    </div>
    <!-- End Custom template -->
  </div>

  <script>
    function loadContent(page) {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', page, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById('page-inner').innerHTML = xhr.responseText;
        }
      };
      xhr.send();
    }
  </script>

  <script>
    function submitForm(event) {
      event.preventDefault();
      const form = document.getElementById('registrationForm');
      const formData = new FormData(form);

      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'insert.php', true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          const response = JSON.parse(xhr.responseText);
          alert(response.message);
          if (response.status === 'success' && response.kembali) {
            loadContent('pages/pendaftaran.php');
          }
        }
      };
      xhr.send(formData);
    }
  </script>

  <script>
    // Fungsi untuk menangani perubahan harga ketika memilih Personal Trainer
    function updateTrainerOption() {
        const personalTrainer = document.getElementById('flexRadioDefault1').checked; // True jika "Gunakan" dipilih
        const type = document.querySelector('input[name="value"]:checked')?.value; // Jenis pengunjung (bulanan/harian)
        let baseAmount = 0;
        let personalTrainerFee = 0;

        // Tentukan harga dasar berdasarkan jenis pengunjung
        if (type === 'bulanan') {
            baseAmount = 180000;
            personalTrainerFee = personalTrainer ? 100000 : 0;
        } else if (type === 'harian') {
            baseAmount = 20000;
            personalTrainerFee = personalTrainer ? 30000 : 0;
        }

        // Hitung total harga
        const totalAmount = baseAmount + personalTrainerFee;

        // Update field amount
        document.getElementById('amount').value = totalAmount;
    }

    // Fungsi utama untuk mengatur tanggal, jenis pengunjung, dan harga dasar
    function updateDate(type) {
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        const hh = String(today.getHours()).padStart(2, '0');
        const min = String(today.getMinutes()).padStart(2, '0');
        const sec = String(today.getSeconds()).padStart(2, '0');
        const p = 'P';

        let joinDate = `${yyyy}-${mm}-${dd}`;
        let expireDate;
        let baseAmount;

        // Tentukan tanggal berlaku berdasarkan jenis pengunjung
        if (type === 'bulanan') {
            const nextMonth = new Date(today);
            nextMonth.setMonth(today.getMonth() + 1);
            const nextMm = String(nextMonth.getMonth() + 1).padStart(2, '0');
            const nextDd = String(nextMonth.getDate()).padStart(2, '0');
            expireDate = `${nextMonth.getFullYear()}-${nextMm}-${nextDd}`;
            baseAmount = 180000;
        } else if (type === 'harian') {
            const nextDay = new Date(today);
            nextDay.setDate(today.getDate() + 1);
            const nextMm = String(nextDay.getMonth() + 1).padStart(2, '0');
            const nextDd = String(nextDay.getDate()).padStart(2, '0');
            expireDate = `${nextDay.getFullYear()}-${nextMm}-${nextDd}`;
            baseAmount = 20000;
        }

        // Set tanggal dan ID pengunjung
        document.getElementById('tgl_bergabung').value = joinDate;
        document.getElementById('masa_berlaku').value = expireDate;
        document.getElementById('id_pengunjung_pendaftaran').value = `${p}${yyyy}${mm}${dd}${hh}${min}${sec}`;

        // Simpan jenis pengunjung ke field amount
        document.getElementById('amount').value = baseAmount;

        // Panggil updateTrainerOption untuk menghitung total harga jika personal trainer dipilih
        updateTrainerOption();
    }

    // Tambahkan event listener pada radio button Personal Trainer
    document.getElementById('flexRadioDefault1').addEventListener('change', updateTrainerOption);
    document.getElementById('flexRadioDefault2').addEventListener('change', updateTrainerOption);

    // Tambahkan event listener pada radio button Jenis Pengunjung
    document.querySelectorAll('input[name="value"]').forEach((radio) => {
        radio.addEventListener('change', (event) => updateDate(event.target.value));
    });

    function updatePerpanjangan() {
    const jumlahBulan = parseInt(document.getElementById('jumlah_bulan').value);
    const biayaPerBulan = 150000; // Biaya per bulan tanpa personal trainer
    const personalTrainer = document.getElementById('flexRadioDefault1').checked; // True jika "Gunakan"
    const biayaPersonalTrainerPerBulan = 100000; // Tambahan biaya per bulan untuk personal trainer

    // Hitung total biaya
    let totalBiaya = jumlahBulan * biayaPerBulan;

    // Tambahkan biaya personal trainer jika dipilih
    if (personalTrainer) {
      totalBiaya += jumlahBulan * biayaPersonalTrainerPerBulan;
    }

    // Tampilkan total biaya di input biaya
    document.getElementById('biaya').value = totalBiaya;

    // Perbarui masa berlaku
    const masaBerlakuSebelum = document.getElementById('tanggal_awal').value;
    const tanggalBaru = new Date(masaBerlakuSebelum);
    tanggalBaru.setMonth(tanggalBaru.getMonth() + jumlahBulan);
    const formattedDate = tanggalBaru.toISOString().split('T')[0];
    document.getElementById('masa_berlaku').value = formattedDate;
    }

    // Tambahkan event listener untuk perubahan pada jumlah bulan
    document.getElementById('jumlah_bulan').addEventListener('change', updatePerpanjangan);

    // Tambahkan event listener untuk perubahan pada opsi personal trainer
    document.getElementById('flexRadioDefault1').addEventListener('change', updatePerpanjangan);
    document.getElementById('flexRadioDefault2').addEventListener('change', updatePerpanjangan);

    function toggleTrainerDropdown(show) {
      const trainerDropdown = document.getElementById('trainerDropdown');
      trainerDropdown.style.display = show ? 'block' : 'none';

      // Reset pilihan dropdown jika opsi "Tidak" dipilih
      if (!show) {
        document.getElementById('id_pt').value = "";
      }
    }

  </script>




</body>

</html>