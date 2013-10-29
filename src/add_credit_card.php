<?php
$con=mysqli_connect("localhost","root","","ruserba");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if ($_POST['btn'] == 'ok') {
	$sql="UPDATE account_customer
	SET cc_number='$_POST[card_number]', cc_expires='$_POST[expired_date]'
	WHERE username='$_POST[username]'";

	if (!mysqli_query($con,$sql))
	  {
	  die('Error: ' . mysqli_error($con));
	  }
	?>
	<script type="text/javascript">
		window.location="index.php";
	</script>
	<?php
} else {
	?>
	<script type="text/javascript">
		window.location="index.php";
	</script>
	<?php	
}
mysqli_close($con);	
?>
