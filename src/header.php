<!DOCTYPE HTML>
<html>
	<head>
		<TITLE>RUSERBA</TITLE>
		<link href="style.css" rel="stylesheet" type="text/css">
		<script src="ModalPopupWindow.js" type="text/javascript"></script>
		</head>
	<body>
		<div id="container">
			<div id="header">
				<a href="index.php"><img src="logo_.png" alt="Tulisan Apa Gitu"></a>
				<div class="Horizlinks">
					<ul>
						<?php
							include('database_connection.php'); // Connects to your Database 
							$data = mysql_query("SELECT DISTINCT category FROM catalog_product") or die(mysql_error()); 
							while($info = mysql_fetch_array( $data )){
								if ($info['category']=="Alat Tulis") {
									$site="alattulis.php";
								}
								else if ($info['category']=="Daging") {
									$site="daging.php";
								}
								else if ($info['category']=="Buah") {
									$site="buah.php";
								}
								else if ($info['category']=="Sayur") {
									$site="sayur.php";
								}
								else if ($info['category']=="Pakaian") {
									$site="pakaian.php";
								}
								echo '<li><a href=',$site,'>',$info['category'],'</a></li>';
							}
	 					?> 
						<li id="li1"> </li>
						<li id="li2"> </li>
						<li id="li3"> </li>
						<li><form action="searching.php" method="POST"> 
							<input type="text" name="nama" id="nama"> 
							<input type="submit" value="Search">
							</form></li>
					</ul>
				</div>
			</div>
		</div>
	<script type="text/javascript">
			modalWin = new CreateModalPopUpObject();
			var a = "<form method=\"post\" action=\"checklogin.php\"> username: <input type=\"text\" id=\"username\" name=\"username\"><br>password: <input type=\"password\" id=\"password\" name=\"password\"><br><input name=\"login\" type=\"submit\" value=\"login\" id=\"login\"/></form>";
			function dipanggil(){
				modalWin.ShowMessage(a,200,300,'Login');
			}
				if (localStorage.username) {
					var username=localStorage.getItem('username');
					document.getElementById("li1").innerHTML="<a href=\"checklogout.php\"> Logout </a>";
					document.getElementById("li2").innerHTML="<a href=\"profile.php\"> Welcome, "+username+"!</a>";
					document.getElementById("li3").innerHTML="<a href=\"shopping_bag.php\"> Shopping Bag</a>";
				} else {
					document.getElementById("li1").innerHTML="<a href=\"javascript:dipanggil();\"> Login </a>";
					document.getElementById("li2").innerHTML="<a href=\"registrasi_identitas.php\"> Register </a>";
					document.getElementById("li3").innerHTML="";
				}
		</script>