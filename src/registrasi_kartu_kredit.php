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
			function testCreditCard () {
  				var no = document.getElementById('card_number').value;
  				var valid = 'true';
  				if (no.length < 16)
  					valid = 'false';
  				for (var i = 0; i < no.length; i ++)
  					if (!(no[i] >= '0' && no[i] <= '9'))
  						valid = 'false';
    			if (valid == 'false') {
        			alert("Please enter your 16 digit credit card numbers");
        			return false;
    			} else {
    				return true;
    			}
       			return false;
			}  			
			function load () {
  				var username = localStorage.getItem('username');
				document.getElementById("username").value=username;
			}
		</script>
	</head>
	<body onLoad="load()">
		<?php include('header.php'); ?>
		<div id="content">
		 	<form method="post" action="add_credit_card.php" onsubmit="return testCreditCard()">
		    	<div>
		      		<input type="hidden" name="username" id="username"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="card_number">Card Number :</label>
		      		<input type="text" name="card_number" id="card_number" class="form_element"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="name_on_card">Name on Card :</label>
		      		<input type="text" newame="name_on_card" id="name_on_card" class="form_element"/>
		      	</div>
		    	<div class="style_form">
		      		<label for="expired_date">Expired Date :</label>
		      		<input type="date" name="expired_date" id="expired_date" class="form_element"/>
		      	</div>
		    	<div class="style_form">
		      		<input name="btn" type="submit" value="ok" id="btn"/>
		      		<input name="btn" type="submit" value="skip" id="btn"/>
		    	</div>
		  	</form>
		</div>
	</body>
</html>
