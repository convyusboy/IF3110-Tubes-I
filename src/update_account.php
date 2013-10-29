<?php
$con=mysqli_connect("localhost","root","","ruserba");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
<?php
$sql="UPDATE account_customer SET password='$_POST[password]', nama_lengkap='$_POST[nama_lengkap]', phone='$_POST[handphone]', alamat='$_POST[alamat]', provinsi='$_POST[provinsi]', postcode='$_POST[kodepos]', city='$_POST[kota]'
WHERE username='$_POST[username]'";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
?>
<script type="text/javascript">
	localStorage.username='<?php echo $_POST['username'];?>';
	var d = new Date();
	d.setDate(d.getDate() + 30);
	var n = d.getTime();
	localStorage.expired_time=n; 
	window.location="registrasi_kartu_kredit.php";
</script>
<?php
mysqli_close($con);
?>
