<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Siswa </title>
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
                  <h4 class="card-title">Tambah Data Siswa</h4>
                  <p class="card-description">
                    Masukan Data Baru
                  </p>
 	<form action="" method="post">
 	<table class="table">
 		<tr>
 			<td>NIS</td>
 			<td>
 				<input class="form-control" type="text" name="nis" placeholder="Masukan Nomor Induk Siswa" size="30" required>
 			</td>
 		</tr>
 		<tr>
 			<td>Nama Siswa</td>
 			<td>
 				<input class="form-control" type="text" name="namasiswa" placeholder="Masukan Nama Siswa" maxlength="40" size="30" required>
 			</td>
 		</tr>
 		<tr>
 			<td>Kelas</td>
 			<td>
 				<select class="form-control" name="kelas" required>
 					<option value="" selected >-pilih kelas-</option>
 					<?php 
 					$data = mysqli_query($konek ,"SELECT * FROM walikelas ORDER BY kelas ASC");
 					while($dta = mysqli_fetch_assoc($data)){
 					 ?>
 					 <option value="<?= $dta['kelas']; ?>"><?= $dta['kelas']; ?></option>
 					 <?php 
 					}
 					?>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td>Tahun Ajaran</td>
 			<td>
 				<input class="form-control" type="text" name="tahunajaran" value="2018/2019" >
 			</td>
 		</tr>
 		<tr>
 			<td>Biaya</td>
 			<td>
 				<input class="form-control" type="text" name="biaya" value="250000" >
 			</td>
 		</tr>
 		<tr>
 			<td>Jatuh Tempo</td>
 			<td>
 				<input class="form-control" type="text" name="jatuhtempo" value="2018-10-10" >
 			</td>
 		</tr>
 		<tr>
 			<td></td>
 			<td>
 				<button class="btn btn-success" type="submit" name="tambah">SIMPAN DATA</button>
 			</td>
 		</tr>
 	</table>
 </form>
 
 </body>
 </html>
<?php 
 if (isset($_POST['tambah']) ) {
 	$nis   		 = $_POST['nis'];
 	$namasiswa 	 = $_POST['namasiswa'];
 	$kelas 		 = $_POST['kelas'];
 	$tahunajaran = $_POST['tahunajaran'];
 	$biaya  	 = $_POST['biaya'];
 	$awaltempo	 = $_POST['jatuhtempo'];

 	$bulanIndo =[
 		'01' => 'januari',
 		'02' => 'Februari',
 		'03' => 'Maret',
 		'04' => 'April',
 		'05' => 'Mei',
 		'06' => 'Juni',
 		'07' => 'Juli',
 		'08' => 'Agustus',
 		'09' => 'September',
 		'10' => 'Oktober',
 		'11' => 'November',
 		'12' => 'Desember',
 	];

 	if ($nis == '' || $namasiswa == '' || $kelas ==''){
 		echo "Form belum lengkap";
 	}else {
 		$simpan = mysqli_query($konek,"INSERT INTO siswa(nis,namasiswa,kelas,tahunajaran,biaya)
 			VALUES('$nis','$namasiswa','$kelas','$tahunajaran','$biaya')");
 		if(!$simpan) {
 			echo "
 			<script>
 			alert('data gagal disimpaan')
 			</script>
 			";
 		}else {
 			// ambil data id terakhir
 			$ds =mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
 			$idsiswa = $ds['idsiswa'];
 			// var_dump($idsiswa); die;
 			// taggihan dan simpan di tabel spp
 			for ($i=0 ; $i<12;$i++){
 				// tanggal jatuh tempo setiap tanggal 10
 				$jatuhtempo = date("Y-m-d" , strtotime("+$i month" , strtotime($awaltempo)));

 				$bulan     = $bulanIndo[date('m' ,strtotime($jatuhtempo))]."  ".date('Y', strtotime($jatuhtempo));
 				// simpan data
 				$add = mysqli_query($konek,"INSERT INTO spp(idsiswa , jatuhtempo, bulan, jumlah) VALUES ('$idsiswa','$jatuhtempo','$bulan','$biaya')");
 				
 			}
 			header('Location:datasiswa.php');
 		}
 	}
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