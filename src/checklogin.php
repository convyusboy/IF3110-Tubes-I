<?php

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="ruserba"; // Database name
$tbl_name="account_customer"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot selec tDB");

// username and password sent from form
$myusername=$_POST['username'];
$mypassword=$_POST['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
	?>
	<script type="text/javascript">
		localStorage.username='<?php echo $_POST['username'];?>';
		var d = new Date();
		d.setDate(d.getDate() + 30);
		var n = d.getTime();
		localStorage.expired_time=n; 
		window.location="index.php";
	</script>
	<?php
}
else {
	?>
	<script type="text/javascript">
		alert("username atau password tidak sesuai");
		window.location="index.php";
	</script>
	<?php
}
?>