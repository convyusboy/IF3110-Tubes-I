<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Registrasi Identitas</title>
		<script type="text/javascript">
			var xmlhttp;
			if (window.XMLHttpRequest)
  			{// code for IE7+, Firefox, Chrome, Opera, Safari
  				xmlhttp=new XMLHttpRequest();
  			}
			else
  			{// code for IE6, IE5
  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
  			var valid = false;
  			function username_check () {
  				var username = document.getElementById('username').value;
  				if(username.length > 4)//if the lenght greater than 3 characters
				{
					xmlhttp.open("POST","ajax_check.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("username="+username);

					xmlhttp.onreadystatechange = function () {
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							if (xmlhttp.responseText == '0') {
								valid = true;
								document.getElementById("status").innerHTML='<img src="available.png" align="absmiddle"> <font color="Green"> Username tersedia </font>';
							} else {
								document.getElementById("status").innerHTML='<img src="not_available.png" align="absmiddle"> <font color="red">Username sudah dipakai </font>';
							}
						}
					}
				}
				else
				{
					document.getElementById("status").innerHTML='<font color="#cc0000">Username harus lebih dari 4 karakter</font>';
				}
				this.validasi();
			}
  			function password_check () {
  				var password = document.getElementById('password').value;
  				var email = document.getElementById('email').value;
  				var username = document.getElementById('username').value;
  				if(password == email || password == username) {
					document.getElementById("status2").innerHTML='<font color="#cc0000">Password tidak boleh sama dengan email maupun username</font>';
  				}
  				else if(password.length > 7)//if the lenght greater than 3 characters
				{
					valid = true;
					document.getElementById("status2").innerHTML='<font color="Green"></font>';
				}
				else
				{
					document.getElementById("status2").innerHTML='<font color="#cc0000">Password harus lebih dari 7 karakter</font>';
				}
				this.validasi();
			}
  			function password2_check () {
  				var password = document.getElementById('password').value;
  				var password2 = document.getElementById('password2').value;
  				if(password == password2) {
					valid = true;
					document.getElementById("status3").innerHTML='<font color="Green"></font>';
  				}
				else
				{
					document.getElementById("status3").innerHTML='<font color="#cc0000">Masukkan ulang sama dengan password</font>';
				}
				this.validasi();
			}
  			function nama_lengkap_check () {
  				var nama_lengkap = document.getElementById('nama_lengkap').value;
				var sppos=nama_lengkap.trim().indexOf(" ");
				if (sppos==-1)
				{
					document.getElementById("status4").innerHTML='<font color="#cc0000">Format nama salah</font>';
				}
				else
				{
					valid = true;
					document.getElementById("status4").innerHTML='<font color="Green"></font>';
				}
				this.validasi();
			}
  			function email_check () {
  				var email = document.getElementById('email').value;
  				var password = document.getElementById('password').value;
				var atpos=email.indexOf("@");
				var dotpos=email.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
				{
					document.getElementById("status5").innerHTML='<font color="#cc0000">Format email salah</font>';
				}
				else if (email == password) {
					document.getElementById("status5").innerHTML='<font color="#cc0000">Email tidak boleh sama dengan password</font>';
  				}
				else
				{
					xmlhttp.open("POST","ajax_check.php",true);
					xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
					xmlhttp.send("email="+email);

					xmlhttp.onreadystatechange = function () {
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
							if (xmlhttp.responseText == '0') {
								valid = true;
								document.getElementById("status5").innerHTML='<img src="available.png" align="absmiddle"> <font color="Green"> Email tersedia </font>';
							} else {
								document.getElementById("status5").innerHTML='<img src="not_available.png" align="absmiddle"> <font color="red">Email sudah dipakai </font>';
							}
						}
					}
				}
				this.validasi();
			}
			function validasi () {
				if (valid) {
					document.getElementById("reg_btn").disabled = false;
				}
			}
		</script>
		<style type="text/css">
			body {
				font-family:Arial, Helvetica, sans-serif
			}
			span {
				font-size:11px;
				margin-left:10px;
			}
			input.form_element {
				width: 221px;
				background: transparent url('bg.jpg') no-repeat;
				color : #747862;
				height:20px;
				border:0;
				padding:4px 8px;
				margin-bottom:0px;
			}
			label {
				width: 150px;
				float: left;
				text-align: left;
				margin-right: 0.5em;
				display: block;
			}
			.style_form {
				margin:3px;
			}
			#content {
				margin-left: auto;
				margin-right: auto;
				width: 600px;
				margin-top:200px;
			}
			#submit_btn {
				margin-left:158px;
				height:30px;
				width: 221px;
			}
		</style>
	</head>
	<body>
		<div id="content">
		 	<form action="register.php" method="get">
		    	<div class="style_form">
		      		<label for="username">Username :</label>
		      		<input type="text" name="username" id="username" class="form_element" onkeydown="username_check()"/>
		      		<span id="status"></span> </div>
		    	<div class="style_form">
		      		<label for="password">Password :</label>
		      		<input type="text" name="password" id="password" class="form_element" onkeydown="password_check()"/>
		      		<span id="status2"></span> </div>
		    	<div class="style_form">
		      		<label for="password2">Confirm Password :</label>
		      		<input type="text" name="password2" id="password2" class="form_element" onkeydown="password2_check()"/>
		      		<span id="status3"></span> </div>
		    	<div class="style_form">
		      		<label for="nama_lengkap">Nama Lengkap :</label>
		      		<input type="text" name="nama_lengkap" id="nama_lengkap" class="form_element" onkeydown="nama_lengkap_check()"/>
		      		<span id="status4"></span> </div>
		    	<div class="style_form">
		      		<label for="email">Email :</label>
		      		<input type="text" name="email" id="email" class="form_element" onkeydown="email_check()"/>
		      		<span id="status5"></span> </div>
		    	<div class="style_form">
		      		<label for="alamat">Alamat :</label>
		      		<input type="text" name="alamat" id="alamat" class="form_element" onkeydown="email_check()"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="provinsi">Provinsi :</label>
		      		<input type="text" name="provinsi" id="provinsi" class="form_element" onkeydown="email_check()"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="kota">Kota :</label>
		      		<input type="text" name="kota" id="kota" class="form_element" onkeydown="email_check()"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="kodepos">Kodepos :</label>
		      		<input type="text" name="kodepos" id="kodepos" class="form_element" onkeydown="email_check()"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="handphone">Nomor Handphone :</label>
		      		<input type="text" name="handphone" id="handphone" class="form_element" onkeydown="email_check()"/>
		      	</div>
		    	<div class="style_form">
		      		<input name="submit" type="submit" value="register" id="reg_btn" disabled/>
		    	</div>
		  	</form>
		</div>
	</body>
</html>
