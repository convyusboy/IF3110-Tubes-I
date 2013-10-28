<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Live Username Check on registration form Using PHP/jQuery</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function()//When the dom is ready 
			{
				$("#username").change(function() 
				{ //if theres a change in the username textbox

					var username = $("#username").val();//Get the value in the username textbox
					if(username.length > 4)//if the lenght greater than 3 characters
					{
						$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
						//Add a loading image in the span id="status"

						$.ajax({  //Make the Ajax Request
						    type: "POST",  
						    url: "ajax_check.php",  //file name
						    data: "username="+ username,  //data
						    success: function(server_response){  
							   	$("#status").ajaxComplete(function(event, request){ 
									if(server_response == '0')//if ajax_check.php return value "0"
									{ 
										$("#status").html('<img src="available.png" align="absmiddle"> <font color="Green"> Username tersedia </font>  ');
										//add this image to the span with id "status"
									}  
									else if(server_response == '1')//if it returns "1"
									{  
										$("#status").html('<img src="not_available.png" align="absmiddle"> <font color="red">Username sudah dipakai </font>');
									}  
							   	});
						   	}
						}); 
					}
					else
					{
						$("#status").html('<font color="#cc0000">Username harus lebih dari 4 karakter</font>');
						//if in case the username is less than or equal 3 characters only 
					}
					return false;
				});
				$("#password").change(function() 
				{ //if theres a change in the password textbox

					var username = $("#username").val();//Get the value in the username textbox
					var password = $("#password").val();//Get the value in the username textbox
				
					if(password.length > 7)//if the lenght greater than 3 characters
					{
						if (strcmp (password, username) == 0 || strcmp (password, email) == 0) {
							$("#status2").html('<img src="not_available.png" align="absmiddle"> <font color="red">Password tidak boleh sama dengan username atau email </font>');
						}
						else {
							$("#status2").html('<img src="available.png" align="absmiddle"> <font color="Green"> Password benar </font>  ');
						} 
					}
					else
					{
						$("#status2").html('<font color="#cc0000">Password harus lebih dari 7 karakter</font>');
					}
					return false;
				});	
				$("#password2").change(function() 
				{ 

					var password = $("#password").val();//Get the value in the username textbox
					var password2 = $("#password2").val();//Get the value in the username textbox
					
					if(strcmp (password, password2) == 0)//if the lenght greater than 3 characters
					{
						$("#status3").html('<img src="available.png" align="absmiddle"> <font color="Green"> Sudah benar </font>  ');
					}  
					else
					{  
						$("#status3").html('<img src="not_available.png" align="absmiddle"> <font color="red">Harus sama dengan password </font>');
					}  
					return false;
				});
				$("#nama_lengkap").change(function() 
				{ //if theres a change in the username textbox

					var nama_lengkap = $("#nama_lengkap").val();//Get the value in the username textbox
					
					var sppos=email.value.indexOf(" ");
 					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  					{
						$("#status4").html('<font color="#cc0000">Format email salah</font>');
  					}
  					else
					{
						$("#status4").html('<img src="available.png" align="absmiddle"> <font color="Green"> Available </font>  ');
					}
					return false;
				});	
				$("#email").change(function() 
				{ //if theres a change in the username textbox

					var email = $("#email").val();//Get the value in the username textbox
					var password = $("#password").val();

					var atpos=email.value.indexOf("@");
 					var dotpos=email.value.lastIndexOf(".");
 					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  					{
						$("#status5").html('<font color="#cc0000">Format email salah</font>');
  					}
  					else if (strcmp (email, password)) {
						$("#status5").html('<font color="#cc0000">Email tidak boleh sama dengan password</font>');
  					}
  					else
  					{
						$("#status5").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
						//Add a loading image in the span id="status"

						$.ajax({  //Make the Ajax Request
						    type: "POST",  
						    url: "ajax_check.php",  //file name
						    data: "email="+ email,  //data
						    success: function(server_response){  
							   	$("#status5").ajaxComplete(function(event, request){ 
									if(server_response == '0')//if ajax_check.php return value "0"
									{ 
										$("#status5").html('<img src="available.png" align="absmiddle"> <font color="Green"> Email tersedia </font>  ');
										//add this image to the span with id "status"
									}  
									else if(server_response == '1')//if it returns "1"
									{  
										$("#status5").html('<img src="not_available.png" align="absmiddle"> <font color="red">Email sudah dipakai </font>');
									}  
							   	});
						   	}
						}); 
					}
					return false;
				});	
			});
		</script>
		<style type="text/css">
			body {
				font-family:Arial, Helvetica, sans-serif
			}
			#status {
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
		      		<input type="text" name="username" id="username" class="form_element"/>
		      		<span id="status"></span> </div>
		    	<div class="style_form">
		      		<label for="password">Password :</label>
		      		<input type="text" name="password" id="password" class="form_element"/>
		      		<span id="status2"></span> </div>
		    	<div class="style_form">
		      		<label for="password2">Confirm Password :</label>
		      		<input type="text" name="password2" id="password2" class="form_element"/>
		      		<span id="status3"></span> </div>
		    	<div class="style_form">
		      		<label for="nama_lengkap">Nama Lengkap :</label>
		      		<input type="text" name="nama_lengkap" id="nama_lengkap" class="form_element"/>
		      		<span id="status4"></span> </div>
		    	<div class="style_form">
		      		<label for="email">Email :</label>
		      		<input type="text" name="email" id="email" class="form_element"/>
		      		<span id="status5"></span> </div>
		    	<div class="style_form">
		      		<input name="submit" type="submit" value="register" id="submit_btn" />
		    	</div>
		  	</form>
		</div>
	</body>
</html>
