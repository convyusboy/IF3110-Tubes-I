<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Profile</title>
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
			var username = localStorage.getItem('username');
			function setAll() {
				xmlhttp.open("POST","ajax_check2.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("username="+username);

				xmlhttp.onreadystatechange = function () {
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("content").innerHTML=xmlhttp.responseText;
					}
				}
			}
		</script>
		<style type="text/css">
			body {
				font-family:Arial, Helvetica, sans-serif
			}
			span {
				width: 150px;
				float: left;
				text-align: left;
				margin-right: 0.5em;
				display: block;
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
	<body onload="setAll()">
		<div id="content">
		</div>
	</body>
</html>
