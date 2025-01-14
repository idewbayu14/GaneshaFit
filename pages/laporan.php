<?php
// Koneksi ke database
$localhost = "localhost";
$username = 'root';
$password = '';
$db = 'ganeshafit';

$conn = mysqli_connect($localhost, $username, $password, $db);


if($conn->connect_error){
    die("Connection failed: ". $conn->connect_error);
}

$result = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Ambil data dari form
  $startYear = $_POST['startYearSelect'];
  $endYear = $_POST['endYearSelect'];
  $startMonth = $_POST['startMonthSelect'];
  $endMonth = $_POST['endMonthSelect'];
  $startDate = $_POST['startDateSelect'];
  $endDate = $_POST['endDateSelect'];

  // Buat tanggal awal dan akhir
  $startDateFormatted = "$startYear-$startMonth-$startDate";
  $endDateFormatted = "$endYear-$endMonth-$endDate";


  $query = '
  SELECT pengunjung.id_pengunjung, pengunjung.nama_lengkap, pengunjung.nama_jenis_pengunjung, catatan_kunjungan.tanggal, pengunjung.biaya
  FROM pengunjung
  JOIN catatan_kunjungan ON pengunjung.id_pengunjung = catatan_kunjungan.id_pengunjung
  WHERE catatan_kunjungan.tanggal BETWEEN "'.$startDateFormatted.'" AND "'.$endDateFormatted.'"';

  $result = mysqli_query($conn,$query);
}

$conn->close();
?>


<h3 class="fw-bold mb-3">Laporan <i class="far fa-newspaper" style="color: tomato"></i></h3>
<h6 class="-op-7 mb-2">Halaman Laporan</h6>

<div class="card">
<form method="POST" >
    <div class="form-group row">
        <div class="col-sm-6">
            <label for="startYearSelect" class="col-form-label">Tahun Awal</label>
            <select class="form-select" name="startYearSelect" id="startYearSelect">
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
        </div>

        <div class="col-sm-6">
            <label for="endYearSelect" class="col-form-label">Tahun Akhir</label>
            <select class="form-select" name="endYearSelect" id="endYearSelect">
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6">
            <label for="startMonthSelect" class="col-form-label">Bulan Awal</label>
            <select class="form-select" name="startMonthSelect" id="startMonthSelect">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>

        <div class="col-sm-6">
            <label for="endMonthSelect" class="col-form-label">Bulan Akhir</label>
            <select class="form-select" name="endMonthSelect" id="endMonthSelect">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-6">
            <label for="startDateSelect" class="col-form-label">Tanggal Awal</label>
            <select class="form-select" name="startDateSelect" id="startDateSelect">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
                
            </select>
        </div>
        
        <div class="col-sm-6">
            <label for="endDateSelect" class="col-form-label">Tanggal Akhir</label>
            <select class="form-select" name="endDateSelect" id="endDateSelect">
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
        </div>
    </div>
    <div class="card-body">
        <p class="demo">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i><span class="ms-2">Cari</span>
          </button>
        </p>
    </div>
</form>
</div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">Laporan Ganesha Gym</div>
    </div>
    <div class="card-body">
      <table class="table table-striped mt-3">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Id Pengunjung</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Pengunjung</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Biaya</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php
            $no = 1;
            try {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$row['id_pengunjung']}</td>
                        <td>{$row['nama_lengkap']}</td>
                        <td>{$row['nama_jenis_pengunjung']}</td>
                        <td>{$row['tanggal']}</td>
                        <td>{$row['biaya']}</td>
                      </tr>";
                $no++;
            }
            } catch (\Throwable $th) {
              echo "<tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                      </tr>";
            }
            ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <a class="btn btn-black mb-4" href="backend/generatepdf.php">
  <span class="btn-label">
  </span>
  Download laporan pengungung hari ini
  </a>


