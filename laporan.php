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
<div class="table-responsive pt-3">
	<table class="table table-bordered table-striped">
		<tr>
			<th >Nama Laporan</th>
			<th width="200">Cetak</th>
		</tr>
		<tr>
			<td>Laporan Data Guru</td>
			<td>
			<a href="laporan_guru.php" target="_blank"><button class="btn btn-primary btn-sm"  > CETAK</button></a>
				</td>
		</tr> 
		<tr>
			<td>
				Laporan Data Siswa
			</td>
			<td>
			<a href="laporan_siswa.php" target="_blank"><button class="btn btn-primary btn-sm" > CETAK</button></a>
			</td>
		</tr>
		
		

		<form class="col-md-2" action="laporan_pembayaran.php" method="GET" target="_blank" >
			<td>
			<b>Laporan Pembayaran</b>
		</td>
		<td>
			Mulai Tanggal <input class="form-control" type="date" name="tgl1" value="<?= date('Y-m-d') ?>">
			Sampai Tanggal <input class="form-control" type="date" name="tgl2" value="<?= date('Y-m-d') ?>">
			<button class="btn btn-success btn-lg" type="submit" name="tampil">Tampilkan</button>
		</td>
		</form>
	</tr>
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