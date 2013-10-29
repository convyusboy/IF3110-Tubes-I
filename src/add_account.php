<?php
$con=mysqli_connect("localhost","root","","ruserba");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
<?php
$sql="INSERT INTO account_customer (email, password, nama_lengkap, username, phone, alamat, provinsi, postcode, city)
VALUES
('$_POST[email]','$_POST[password]','$_POST[nama_lengkap]','$_POST[username]','$_POST[handphone]','$_POST[alamat]','$_POST[provinsi]','$_POST[kodepos]','$_POST[kota]')";
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
