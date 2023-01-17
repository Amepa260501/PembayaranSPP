<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Laporan </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <?php include 'koneksi.php'; ?>
    <?php include '_navbar.php'; ?>
    <!-- partial -->
    <?php include '_settings-panel.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include '_settings-panel.php'; ?>
      <?php include '_sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Masukan NIS Siswa</h4>
 <form action="" method="get">
 	<table class="table">
 		<tr>
 			<td>NIS</td>
 			<td>:</td>
 			<td>
 				<input class="form-control" type="text" name="nis">
 			</td>
 			<td>
 				<button class="btn btn-success" type="submit" name="cari">Cari</button>
 			</td>
 		</tr>
 		
 	</table>
 </form>
<?php 
if (isset($_GET['nis']) && $_GET['nis'] != ''){
	$data = $konek->query("SELECT * FROM siswa WHERE nis = '$_GET[nis]'");
	$dta = mysqli_fetch_assoc($data);
	$nis = $dta['nis'];

?>
<div class="panel panel-info">
	<div class="panel-heading">
<h3>biodata siswa</h3>
</div>
<div class="panel panel-body">
	<table class="table table-bordered table-striped">
		<tr>
			<td>NIS</td>
			<td><?= $dta['nis'] ?></td>
		</tr>
		<tr>
			<td>Nama Siswa</td>
			<td><?= $dta['namasiswa'] ?></td>
		</tr>
		<tr>
			<td>Kelas</td>
			<td><?= $dta['kelas'] ?></td>
		</tr>
		<tr>
			<td>Tahun ajaran </td>
			<td><?= $dta['tahunajaran'] ?></td>
		</tr>
	</table>
</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading">
<h3>Tagihan SPP Siswa</h3>
</div>
<div class="panel-body ">
	<table class="table table-bordered table-striped">
<tr>
	<th>NO</th>
	<th>Bulan</th>
	<th>jatuh tempo</th>
	<th>No bayar</th>
	<th>Tanggal Bayar</th>
	<th>Jumalah</th>
	<th>Keterangan</th>
	<th>Bayar</th>
</tr>
<?php 
$sql= mysqli_query($konek ," SELECT * FROM spp WHERE idsiswa = '$dta[idsiswa]' ORDER BY jatuhtempo ASC ");
$i=1;
while($sq = mysqli_fetch_assoc($sql)){
	echo "

		<tr>
			<td>$i</td>
			<td>$sq[bulan]</td>
			<td>$sq[jatuhtempo]</td>
			<td>$sq[nobayar]</td>
			<td>$sq[tglbayar]</td>
			<td>$sq[jumlah]</td>
			<td>$sq[ket]</td>
			<td align='center'";
				if ($sq['nobayar'] == ''){
					echo "<a   href='proses_transaksi.php?nis=$nis&act=bayar&id=$sq[idspp]'></a> ";
					echo "<a class='btn btn-primary btn-sm' href='proses_transaksi.php?nis=$nis&act=bayar&id=$sq[idspp]'>Bayar</a> ";
				}else {
					echo "</a>";
					echo "<a class='btn btn-danger btn-sm' href='proses_transaksi.php?nis=$nis&act=batal&id=$sq[idspp]'>Batal</a> ";
					echo "<a class='btn btn-success btn-sm' href='cetak_slip_transaksi.php?nis=$nis&act=bayar&id=$sq[idspp]' target='_blank'>Cetak</a> ";
					
				}
			echo "</td>
		</tr>

		";
		$i++;
}
 ?>
</table>
</div>
</div>
<?php 
}
?>
</div>
              </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
    </div>
  </div>
  <?php  include '_footer.php';  ?>
</body>
</html>