<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Live Username Check on registration form Using PHP/jQuery</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function()//When the dom is ready 
			{
				$("#card_number").change(function() 
				{ //if theres a change in the card_number textbox

					var card_number = $("#card_number").val();//Get the value in the card_number textbox
					if(card_number.length > 4)//if the lenght greater than 3 characters
					{
						$("#status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
						//Add a loading image in the span id="status"

						$.ajax({  //Make the Ajax Request
						    type: "POST",  
						    url: "ajax_check.php",  //file name
						    data: "card_number="+ card_number,  //data
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
						//if in case the card_number is less than or equal 3 characters only 
					}
					return false;
				});
				$("#name_on_card").change(function() 
				{ //if theres a change in the card_number textbox

					var name_on_card = $("#name_on_card").val();//Get the value in the card_number textbox
					if(name_on_card.length > 4)//if the lenght greater than 3 characters
					{

						$.ajax({  //Make the Ajax Request
						    type: "POST",  
						    url: "ajax_check.php",  //file name
						    data: "card_number="+ card_number,  //data
						    success: function(server_response){  
							   	$("#status4").ajaxComplete(function(event, request){ 
									if(server_response == '0')//if ajax_check.php return value "0"
									{ 
										$("#status4").html('<img src="available.png" align="absmiddle"> <font color="Green"> Available </font>  ');
										//add this image to the span with id "status"
									}  
									else if(server_response == '1')//if it returns "1"
									{  
										$("#status4").html('<img src="not_available.png" align="absmiddle"> <font color="red">Not Available </font>');
									}  
							   	});
						   	}
						}); 
					}
					else
					{
						$("#status4").html('<font color="#cc0000">Username too short</font>');
						//if in case the card_number is less than or equal 3 characters only 
					}
					return false;
				});	
				$("#expired_date").change(function() 
				{ //if theres a change in the card_number textbox

					var expired_date = $("#expired_date").val();//Get the value in the card_number textbox
					var password = $("#password").val();

					var atpos=x.value.indexOf("@");
 					var dotpos=x.value.lastIndexOf(".");
 					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  					{
						$("#status5").html('<font color="#cc0000">Format expired_date salah</font>');
  					}
  					else if (strcmp (expired_date, password)) {
						$("#status5").html('<font color="#cc0000">Email tidak boleh sama dengan password</font>');
  					}
  					else
  					{
						$("#status5").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
						//Add a loading image in the span id="status"

						$.ajax({  //Make the Ajax Request
						    type: "POST",  
						    url: "ajax_check.php",  //file name
						    data: "expired_date="+ expired_date,  //data
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
		      		<label for="card_number">Card Number :</label>
		      		<input type="text" name="card_number" id="card_number" class="form_element"/>
		      		<span id="status"></span> </div>
		    	<div class="style_form">
		      		<label for="name_on_card">Name on Card :</label>
		      		<input type="text" name="name_on_card" id="name_on_card" class="form_element"/>
		      		<span id="status4"></span> </div>
		    	<div class="style_form">
		      		<label for="expired_date">Expired Date :</label>
		      		<input type="text" name="expired_date" id="expired_date" class="form_element"/>
		      		<span id="status5"></span> </div>
		    	<div class="style_form">
		      		<input name="submit" type="submit" value="submit" id="submit_btn" />
		    	</div>
		  	</form>
		</div>
	</body>
</html>
