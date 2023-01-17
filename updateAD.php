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
                  <h4 class="card-title">Ubah Data Admin</h4>
                  <p class="card-description">
                    Masukan Data Baru
                  </p>
<?php
include 'koneksi.php';
$data = mysqli_query($konek, "SELECT * FROM admin WHERE idadmin='$_GET[id]'");
$dta = mysqli_fetch_assoc($data);
include '_navbar.php';
?>
<form action="" method="post">
<table class="table ">
	<tr>
		<td> Nama Lengkap</td>
		<td>
			<input class="form-control" type="text" name="nama"value="<?= $dta['namalengkap'] ?>">
		</td>
	</tr>
	<tr>
		<td> Username</td>
		<td>
			<input type="hidden" name="id" value="<?= $dta['idadmin'] ?>">
			<input class="form-control" type="text" name="user" value="<?= $dta['username'] ?>">
		</td>
	</tr>
	<tr>
		<td> Password</td>
		<td>
			<input class="form-control" type="Password" id="pass" name="pass" value="<?= $dta['password'] ?>">
			<input type="checkbox" name="cek" onclick="ShowPass()"> Show/Hide Password
		</td>
	</tr>
	
	<tr>
		<td></td>
		<td>
			<button class="btn btn-success" type="submit" name="ubah">UPDATE</button>
			
		</td>
	</tr>
</table>
</form>

<?php
 if ( isset($_POST['ubah']) ) {
 	$id   = $_POST['id'];
 	$user = $_POST['user'];
 	$pass = $_POST['pass'];
 	$p    = hash('sha1', $pass);
 	$nama = $_POST['nama'];

 	$ubah = $konek -> query("UPDATE admin SET
 	     username = '$user', 
 		 password     = '$p',
 		 namalengkap = '$nama' WHERE idadmin =".$id);

 	if( $ubah ){
 		echo "
 		<script>
 		alert('data admin berhasil diupdate');
 		document.location.href = 'dataadmin.php';
 		</script>
 		";
 	}else {
 		echo "
 		<script>
 		alert('data admin gagal diupdate');
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