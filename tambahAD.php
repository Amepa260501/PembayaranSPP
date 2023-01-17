<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Admin </title>
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
                  <h4 class="card-title">Tambah Data Admin</h4>
                  <p class="card-description">
                    Masukan Data Baru
                  </p>
<form action="" method="post">
<table class="table ">
	<tr>
		<td> Username</td>
		<td>
			<input class="form-control" type="text" name="user" placeholder="Masukan Username">
		</td>
	</tr>
	<tr>
		<td> Password</td>
		<td>
			<input class="form-control" type="Password" name="pass" placeholder="Masukan Password">
		</td>
	</tr>
	<tr>
		<td> Nama Lengkap</td>
		<td>
			<input class="form-control" type="text" name="nama" placeholder="Masukan Nama Lengkap">
		</td>
	</tr>
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="tambah">SIMPAN</button>
		</td>
	</tr>
</table>
</form>

<?php
 if ( isset($_POST['tambah']) ) {
 	$user = $_POST['user'];
 	$pass = $_POST['pass'];
 	$p    = hash('sha1', $pass);
 	$nama = $_POST['nama'];

 	$exec = mysqli_query($konek,"INSERT INTO admin(username,password,namalengkap) Values ('$user','$p','$nama')");

 	if( $exec ){
 		echo "
 		<script>
 		alert('data admin berhasil ditambahkan');
 		document.location.href = 'dataadmin.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data admin gagal ditambahkan');
 		document.location.href = 'dataadmin.php';
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