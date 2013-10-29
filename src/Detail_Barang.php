		<?php include('header.php'); ?>		
		<?php
			include('database_connection.php'); 
			$result = mysql_query("select * from catalog_product where id = '".$_GET['id']."'");
			$result1 = mysql_query("select path from catalog_product where id = '".$_GET['id']."'");
			while ($row = mysql_fetch_array($result)) {
			    $new_array[] = $row;
			}
			while ($row1 = mysql_fetch_array($result1)) {
			    $new_array1[] = $row1;
			}
			mysql_close($bd);// close mysql then do other job with set_time_limit(59)
		?>
		<br>
		<?php
			echo '<img src=".'.$new_array1[0]['path'].'" width="250" height="250">';
			echo '<div class="ex"><center>'.$new_array[0]['name'].'<center>';
			echo $new_array[0]['price'];
			echo "<br>";
			echo $new_array[0]['description'];
			echo '<form action="proses_form.php" method="POST" >
			<br>
			Tambahan Permintaan: <input type="text" name="jumlah" id="jumlah">
			<br>
			Jumlah Pembelian: <input type="text" name="jumlah" id="jumlah">
			<br>
			<span id="status"></span>
			</form>';
			echo '<center><button type="button" onclick="jumlah_check('.$_GET['id'].')">Add To Shooping Bag</button><center></div>';
			echo "<br>";
			echo "<br>";
			echo "<br>";
		?>

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
  			function jumlah_check (id) {
  				var jumlah = document.getElementById('jumlah').value;
  				xmlhttp.open("POST","ajax_check.php",true);
				xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				xmlhttp.send("id="+id);
				xmlhttp.onreadystatechange = function () {
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						if (parseInt(xmlhttp.responseText) >= parseInt(jumlah)) {
							var bag;
							if (localStorage.shoppingbag) {
								var getShoppingBag = localStorage.getItem('shoppingbag');
								bag = JSON.parse(getShoppingBag);
							} else {
								bag={};					
							}
							if (bag[id]===undefined)
								bag[id]=0;
							bag[id]=parseInt(bag[id])+parseInt(jumlah);
							localStorage.setItem('shoppingbag', JSON.stringify(bag))
						} else {
		
							document.getElementById("status").innerHTML='<font color="red">Jumlah tersisa ='+xmlhttp.responseText+' </font>';
						}
					}
				}
			}
		</script>
	</body>
</html>
