<?php
	include "connect.php";

	$email = $_POST['email'];
	$pass = md5($_POST['password']);
	$name = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jk = $_POST['jk'];
	$notelp = $_POST['notelp'];




	$sql_buat = "INSERT INTO user(id_user, email, password, nama, alamat, jk,notelp	) VALUE('','$email','$pass','$name','$alamat','$jk','$notelp')";

	if (mysqli_query($conn, $sql_buat)){
		$query = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
  		$result = mysqli_fetch_array($query);
		$_SESSION['id'] = $result['id_user'];
		$_SESSION['status'] = "User";
?>
		<script language="javascript">alert("Register Successful");</script>
		<script>document.location.href='../profile.php';</script>
<?php
	}
	else{
?>
		<script language="javascript">alert("Register Failed");</script>
		<script>document.location.href='../register.php';</script>
<?php
	}
	mysqli_close($conn);
?>
