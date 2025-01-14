<?php
require ('../fpdf/fpdf.php');
include '../koneksi.php';

date_default_timezone_set('Asia/Jakarta');
$today = new DateTime();

$days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
$dayName = $days[$today->format('w')];

$date = $today->format('d');
$month = $today->format('m');
$year = $today->format('Y');

$formattedDate = "$dayName, $year-$month-$date";
$tanggal = "$year-$month-$date";

$query ="SELECT nama_lengkap, nama_jenis_pengunjung, biaya from pengunjung where tgl_bergabung = '$tanggal'";
$result = mysqli_query($conn,$query);



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);


$pdf->Cell(71, 10, '', 0, 0);
$pdf->Cell(59, 10, 'LAPORAN', 0, 0);
$pdf->Cell(59, 10, '', 0, 1);

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(80, 5, 'Tanggal', 0, 0);
$pdf->Cell(59, 5, '', 0, 0);
$pdf->Cell(59, 5, 'Detail', 0, 0);

$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);

$pdf->Cell(130, 5, $formattedDate, 0, 0);
$pdf->Cell(1, 5, 'Nama Petugas: mas pur', 0, 0);

$pdf->Ln(25);

$pdf->Line(10, 50, 200, 50);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Daftar pengunjung hari ini', 0, 0);

$pdf->Ln(15);

$pdf->Cell(10, 5, '', 0, 0, 'C');
$pdf->Cell(10, 5, 'No', 1, 0, 'C');
$pdf->Cell(80, 5, 'Nama Pengunjung', 1, 0, 'C');
$pdf->Cell(40, 5, 'Jenis Pengunjung', 1, 0, 'C');
$pdf->Cell(40, 5, 'Biaya', 1, 0, 'C');

$pdf->Ln();
$no = 0;
$total = 0;
    
              while ($row = mysqli_fetch_assoc($result)) {
                $pdf->Cell(10, 5, '', 0, 0, 'C');
                $pdf->Cell(10, 5, $no + 1, 1, 0, 'C');
                $pdf->Cell(80, 5, $row['nama_lengkap'], 1, 0, 'C');
                $pdf->Cell(40, 5, $row['nama_jenis_pengunjung'], 1, 0, 'C');
                $pdf->Cell(40, 5, "Rp.".$row['biaya'], 1, 0, 'C');
                $pdf->Ln();
                $no++;
                $total += $row['biaya'] ;
            }
            

$pdf->Cell(10, 5, '', 0, 0, 'C');
$pdf->Cell(130, 5, 'Total', 1, 0, 'C');
$pdf->Cell(40, 5, "Rp. ". $total, 1, 0, 'C');

$pdf->Ln(30);

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(59, 5, 'Tanda tangan pengirim', 0, 0);

$pdf->Line(140, 190, 200, 190);

$pdf->Output();
?>