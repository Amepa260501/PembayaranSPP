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
  <link rel="shortcut icon" href="img/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <?php include 'koneksi.php'; ?>
    <?php include '_navbar.php'; ?>
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
                  <h4 class="card-title">Ubah Data Siswa</h4>
                  <p class="card-description">
                    Masukan Data Baru
                  </p>
<?php 
include 'koneksi.php';
$sqlsiswa = mysqli_query($konek , "SELECT * FROM siswa WHERE idsiswa = '$_GET[id]' ") ;
$sw = mysqli_fetch_assoc($sqlsiswa);

include '_navbar.php';
 ?>
 	<?php if (isset($error)) : ?>
 		<p style="font-family: arial; color: red; size: 14px;">Silahkan Lengkapi Form Terlebih Dahulu</p>
 	<?php endif; ?>
 	<form action="" method="post">
 	<table class="table">
 		<tr>
 			<td>NIS</td>
 			<td>
 				<input class="form-control" type="hidden" name="id" value="<?= $sw['idsiswa'] ?>">
 				<input class="form-control" type="text" name="nis" value="<?= $sw['nis'] ?>" size="30">
 			</td>
 		</tr>
 		<tr>
 			<td>Nama Siswa</td>
 			<td>
 				<input class="form-control" type="text" name="namasiswa" value="<?= $sw['namasiswa'] ?>" maxlength="40" size="30">
 			</td>
 		</tr>
 		<tr>
 			<td>Kelas</td>
 			<td>
 				<select class="form-control" name="kelas">
 					<?php 
 					$data = mysqli_query($konek ,"SELECT * FROM walikelas ORDER BY kelas ASC");
 					while($kls = mysqli_fetch_assoc($data)){
 					 ?>
 					 <?php if($sw['kelas'] == $kls['kelas']) {
 					 	$selected = 'selected';
 					 }else {
 					 	$selected="";
 					 }
 					 ?>
 					 <option value="<?= $kls['kelas']; ?>"><?= $kls['kelas']; ?></option>
 					 <?php
 					}
 					 ?>
 							
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td>Tahun Ajaran</td>
 			<td>
 				<input class="form-control" type="text" name="tahunajaran" value="<?= $sw['tahunajaran'] ?>" >
 			</td>
 		</tr>
 		<tr>
 			<td>Biaya</td>
 			<td>
 				<input class="form-control" type="text" name="biaya" value="<?= $sw['biaya'] ?>" >
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
 				<button class="btn btn-success" type="submit" name="ubah">UPDATE DATA</button>
 			</td>
 		</tr>
 	</table>
 </form>
 
 </body>
 </html>
<?php 
 if (isset($_POST['ubah']) ) {
 	$id = $_POST['id'];
 	$nis   		 = $_POST['nis'];
 	$namasiswa 	 = $_POST['namasiswa'];
 	$kelas 		 = $_POST['kelas'];
 	$tahunajaran = $_POST['tahunajaran'];
 	$biaya  	 = $_POST['biaya'];
 	// $awaltempo	 = $_POST['jatuhtempo'];

 	$ubah = mysqli_query($konek , "UPDATE siswa SET nis = '$nis',
 		namasiswa = '$namasiswa',
 		kelas = '$kelas',
 		tahunajaran = '$tahunajaran',
 		biaya  = '$biaya' WHERE idsiswa = '$id'");

 	if ($ubah){
 		echo "
 		<script>
 		alert('data berhasil diedit');
 		document.location.href = 'datasiswa.php';
 		</script>
 		";
 	}else{
 		echo "
 		<script>
 		alert('data gagal diedit');
 		</script>
 		";
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