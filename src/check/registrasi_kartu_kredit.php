<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Registrasi Identitas</title>
		<script type="text/javascript">
			alert(localStorage.username);
			var xmlhttp;
			if (window.XMLHttpRequest)
  			{// code for IE7+, Firefox, Chrome, Opera, Safari
  				xmlhttp=new XMLHttpRequest();
  			}
			else
  			{// code for IE6, IE5
  				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  			}
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
		 	<form method="post" action="add_credit_card.php">
		    	<div class="style_form">
		      		<label for="card_number">Card Number :</label>
		      		<input type="text" name="card_number" id="card_number" class="form_element"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="name_on_card">Name on Card :</label>
		      		<input type="text" name="name_on_card" id="name_on_card" class="form_element"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="expired_date">Expired Date :</label>
		      		<input type="text" name="expired_date" id="expired_date" class="form_element"/>
		      	</div>
		    	<div class="style_form">
		      		<input name="submit" type="submit" value="register" id="reg_btn"/>
		    	</div>
		  	</form>
		</div>
	</body>
</html>
