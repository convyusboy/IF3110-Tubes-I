<?php
include('database_connection.php');
//Include The Database Connection File 

if(isset($_POST['username']))//If a username has been submitted 
{
	$username = mysql_real_escape_string($_POST['username']);//Some clean up :)

	$check_for_username = mysql_query("SELECT * FROM account_customer WHERE username='$username'");
	//Query to check if username is available or not 
	$row = mysql_fetch_array($check_for_username);

	echo "
	<div class=\"style_form\">
		<label for=\"username\">Username :</label>
		<span>".$row['username']."</span> </div><br>
	<div class=\"style_form\">
		<label for=\"nama_lengkap\">Nama Lengkap :</label>
		<span>".$row['nama_lengkap']."</span> </div>
	<br>
   	<div class=\"style_form\">
   		<label for=\"email\">Email :</label>
   		<span>".$row['email']."</span> </div>
   	<br>
   	<div class=\"style_form\">
   		<label for=\"alamat\">Alamat :</label>
   		<span>".$row['alamat']."</span> </div>
   	<br>
   	<div class=\"style_form\">
   		<label for=\"provinsi\">Provinsi :</label>
   		<span>".$row['provinsi']."</span> </div>
   	<br>
   	<div class=\"style_form\">
   		<label for=\"kota\">Kota :</label>
   		<span>".$row['city']."</span> </div>
   	<br>
   	<div class=\"style_form\">
   		<label for=\"kodepos\">Kodepos :</label>
   		<span>".$row['postcode']."</span> </div>
   	<br>
    <div class=\"style_form\">
      <label for=\"handphone\">Nomor Handphone :</label>
      <span>".$row['phone']."</span> </div>
    <br>
   	<div class=\"style_form\">
   		<label for=\"handphone\">Jumlah Transaksi :</label>
   		<span>".$row['n_transaction']."</span> </div>
   	<br>
   	<div class=\"style_form\">
   		<label for=\"handphone\"></label>
   		<a href=\"edit_profile.php\">Edit Profile</a> </div>
   	<br>
		";
} else if(isset($_POST['username2']))//If a username has been submitted 
{
	$username = mysql_real_escape_string($_POST['username2']);//Some clean up :)

	$check_for_username = mysql_query("SELECT * FROM account_customer WHERE username='$username'");
	//Query to check if username is available or not 
	$row = mysql_fetch_array($check_for_username);

	echo "
 	<form method=\"post\" action=\"update_account.php\">
      <div class=\"style_form\">
          <input type=\"hidden\" name=\"username\" id=\"username\" value=\"".$username."\" class=\"form_element\" onkeydown=\"password_check()\"/>
          </div>
    	<div class=\"style_form\">
      		<label for=\"password\">Password :</label>
      		<input type=\"text\" name=\"password\" id=\"password\" class=\"form_element\" onkeydown=\"password_check()\"/>
      		<span id=\"status2\"></span> </div>
    	<div class=\"style_form\">
      		<label for=\"password2\">Confirm Password :</label>
      		<input type=\"text\" name=\"password2\" id=\"password2\" class=\"form_element\" onkeydown=\"password2_check()\"/>
      		<span id=\"status3\"></span> </div>
    	<div class=\"style_form\">
      		<label for=\"nama_lengkap\">Nama Lengkap :</label>
      		<input type=\"text\" name=\"nama_lengkap\" id=\"nama_lengkap\" value=\"".$row['nama_lengkap']."\" class=\"form_element\" onkeydown=\"nama_lengkap_check()\"/>
      		<span id=\"status4\"></span> </div>
    	<div class=\"style_form\">
      		<label for=\"alamat\">Alamat :</label>
      		<input type=\"text\" name=\"alamat\" id=\"alamat\" value=\"".$row['alamat']."\" class=\"form_element\" onkeydown=\"email_check()\"/>
      	</div>
    	<div class=\"style_form\">
      		<label for=\"provinsi\">Provinsi :</label>
      		<input type=\"text\" name=\"provinsi\" id=\"provinsi\" value=\"".$row['provinsi']."\" class=\"form_element\" onkeydown=\"email_check()\"/>
      	</div>
    	<div class=\"style_form\">
      		<label for=\"kota\">Kota :</label>
      		<input type=\"text\" name=\"kota\" id=\"kota\" value=\"".$row['city']."\" class=\"form_element\" onkeydown=\"email_check()\"/>
      	</div>
    	<div class=\"style_form\">
      		<label for=\"kodepos\">Kodepos :</label>
      		<input type=\"text\" name=\"kodepos\" id=\"kodepos\" value=\"".$row['postcode']."\" class=\"form_element\" onkeydown=\"email_check()\"/>
      	</div>
    	<div class=\"style_form\">
      		<label for=\"handphone\">Nomor Handphone :</label>
      		<input type=\"text\" name=\"handphone\" id=\"handphone\" value=\"".$row['phone']."\" class=\"form_element\" onkeydown=\"email_check()\"/>
      	</div>
    	<div class=\"style_form\">
      		<input name=\"submit\" type=\"submit\" value=\"edit\" id=\"reg_btn\" disabled/>
    	</div>
  	</form>	";
}
?>