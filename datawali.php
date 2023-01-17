<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Wali Kelas </title>
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
<?php include '_navbar.php'; ?>
<div class="container-fluid page-body-wrapper">
      <?php include '_settings-panel.php'; ?>
      <?php include '_sidebar.php'; ?>
	  <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 stretch-card">
              <div class="card">
			  <div class="card-body">
<a class="btn btn-primary " href="tambahWL.php">TAMBAH DATA</a>
<div class="table-responsive pt-3">
<table class="table table-bordered table-striped">
<thead> 	
<tr>
	<th>NO</th>
	<th>KELAS</th>
	<th>NAMA GURU</th>
	<th>AKSI</th>
</tr>
<?php
	include 'koneksi.php';
	$data = $konek -> query("SELECT walikelas.kelas, walikelas.idguru,guru.namaguru FROM walikelas INNER JOIN guru ON walikelas.idguru=guru.idguru ORDER BY walikelas.kelas ASC ");

	$i = 1;
	while($dta = mysqli_fetch_assoc($data)) :
	?>
	<tr>
		<td width="40" align="center"><?=$i;?></td>
		<td align="center"><?= $dta['kelas'] ?></td>
		<td><?= $dta['namaguru'] ?></td>
		<td width="160px">
			<a class="btn btn-warning btn-sm" href="ubahWL.php?kls=<?= $dta['kelas'] ?>">EDIT</a> 
			<a class="btn btn-danger btn-sm" href="hapusWL.php?kls=<?= $dta['kelas'] ?>"onclick="return confirm('apakah anda yakin menghapus data?')">HAPUS</a>
		</td>
	</tr>
	<?php $i++ ; ?>
<?php endwhile; ?>
</table>
</div>
                </div>
              </div>
            </div>
          </div>
        </div>
	
	</div>
    </div>
  </div>
  <?php include '_footer.php'; ?>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
</body>
</html>