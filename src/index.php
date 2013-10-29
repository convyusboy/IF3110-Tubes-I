		<?php include('header.php'); ?>		

		<?php
			include('database_connection.php'); 
			$result1 = mysql_query("select * from catalog_product where category = 'alat tulis' order by number_sold DESC");
			$result1a = mysql_query("select path from catalog_product where category = 'alat tulis' order by number_sold DESC");
			$result2 = mysql_query("select * from catalog_product where category = 'daging' order by number_sold DESC");
			$result2a = mysql_query("select path from catalog_product where category = 'daging' order by number_sold DESC");
			$result3 = mysql_query("select * from catalog_product where category = 'sayur' order by number_sold DESC");
			$result3a = mysql_query("select path from catalog_product where category = 'sayur' order by number_sold DESC");
			$result4 = mysql_query("select * from catalog_product where category = 'buah' order by number_sold DESC");
			$result4a = mysql_query("select path from catalog_product where category = 'buah' order by number_sold DESC");
			$result5 = mysql_query("select * from catalog_product where category = 'pakaian' order by number_sold DESC");
			$result5a = mysql_query("select path from catalog_product where category = 'pakaian' order by number_sold DESC");
			while ($row = mysql_fetch_array($result1)) {
			    $new_array1[] = $row;
			}
			while ($row1 = mysql_fetch_array($result1a)) {
			    $new_array1a[] = $row1;
			}
			while ($row = mysql_fetch_array($result2)) {
			    $new_array2[] = $row;
			}
			while ($row1 = mysql_fetch_array($result2a)) {
			    $new_array2a[] = $row1;
			}
			while ($row = mysql_fetch_array($result3)) {
			    $new_array3[] = $row;
			}
			while ($row1 = mysql_fetch_array($result3a)) {
			    $new_array3a[] = $row1;
			}
			while ($row = mysql_fetch_array($result4)) {
			    $new_array4[] = $row;
			}
			while ($row1 = mysql_fetch_array($result4a)) {
			    $new_array4a[] = $row1;
			}
			while ($row = mysql_fetch_array($result5)) {
			    $new_array5[] = $row;
			}
			while ($row1 = mysql_fetch_array($result5a)) {
			    $new_array5a[] = $row1;
			}
			mysql_close($bd);// close mysql then do other job with set_time_limit(59)
		?>

		<div class="table">
		    <div class="row">
				<?php
					for($i=0; $i<3; $i++){
						echo '<div class="cell tricol">';
						echo 'ALAT TULIS';
						echo "<br>";
						echo '<img src=".'.$new_array1a[$i]['path'].'" width="250" height="250">';
						echo '<div class="ex"><center><a href="Detail_Barang.php?id='.$new_array1[$i]['id'].'">'.$new_array1[$i]['name'].'</a><center>';
						echo $new_array1[$i]['price'];
						echo "<br>";
						echo $new_array1[$i]['number_sold'];
						echo '<form action="proses_form.php" method="POST" >
						Jumlah Pembelian: <input type="text" name="jumlah" id="jumlah">
						<br>
						<span id="status"></span>
						</form>';
						echo '<center><button type="button" onclick="jumlah_check('.$new_array1[$i]['id'].')">Add To Shooping Bag</button><center></div>';
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo '</div>';
					}
				?>
		    </div>
		    <div class="row">
				<?php
					for($i=0; $i<3; $i++){
						echo '<div class="cell tricol">';
						echo 'DAGING';
						echo "<br>";
						echo '<img src=".'.$new_array2a[$i]['path'].'" width="250" height="250">';
						echo '<div class="ex"><center><a href="Detail_Barang.php?id='.$new_array2[$i]['id'].'">'.$new_array2[$i]['name'].'</a><center>';
						echo $new_array2[$i]['price'];
						echo "<br>";
						echo $new_array2[$i]['number_sold'];
						echo '<form action="proses_form.php" method="POST" >
						Jumlah Pembelian: <input type="text" name="jumlah" id="jumlah">
						<br>
						<span id="status"></span>
						</form>';
						echo '<center><button type="button" onclick="jumlah_check('.$new_array2[$i]['id'].')">Add To Shooping Bag</button><center></div>';
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo '</div>';
					}
				?>
		    </div>
		    <div class="row">
				<?php
					for($i=0; $i<3; $i++){
						echo '<div class="cell tricol">';
						echo 'SAYUR';
						echo "<br>";
						echo '<img src=".'.$new_array3a[$i]['path'].'" width="250" height="250">';
						echo '<div class="ex"><center><a href="Detail_Barang.php?id='.$new_array3[$i]['id'].'">'.$new_array3[$i]['name'].'</a><center>';
						echo $new_array3[$i]['price'];
						echo "<br>";
						echo $new_array3[$i]['number_sold'];
						echo '<form action="proses_form.php" method="POST" >
						Jumlah Pembelian: <input type="text" name="jumlah" id="jumlah">
						<br>
						<span id="status"></span>
						</form>';
						echo '<center><button type="button" onclick="jumlah_check('.$new_array3[$i]['id'].')">Add To Shooping Bag</button><center></div>';
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo '</div>';
					}
				?>
		    </div>
		    <div class="row">
				<?php
					for($i=0; $i<3; $i++){
						echo '<div class="cell tricol">';
						echo 'BUAH';
						echo "<br>";
						echo '<img src=".'.$new_array4a[$i]['path'].'" width="250" height="250">';
						echo '<div class="ex"><center><a href="Detail_Barang.php?id='.$new_array4[$i]['id'].'">'.$new_array4[$i]['name'].'</a><center>';
						echo $new_array4[$i]['price'];
						echo "<br>";
						echo $new_array4[$i]['number_sold'];
						echo '<form action="proses_form.php" method="POST" >
						Jumlah Pembelian: <input type="text" name="jumlah" id="jumlah">
						<br>
						<span id="status"></span>
						</form>';
						echo '<center><button type="button" onclick="jumlah_check('.$new_array4[$i]['id'].')">Add To Shooping Bag</button><center></div>';
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo '</div>';
					}
				?>
		    </div>
		    <div class="row">
				<?php
					for($i=0; $i<3; $i++){
						echo '<div class="cell tricol">';
						echo 'PAKAIAN';
						echo "<br>";
						echo '<img src=".'.$new_array5a[$i]['path'].'" width="250" height="250">';
						echo '<div class="ex"><center><a href="Detail_Barang.php?id='.$new_array5[$i]['id'].'">'.$new_array5[$i]['name'].'</a><center>';
						echo $new_array5[$i]['price'];
						echo "<br>";
						echo $new_array5[$i]['number_sold'];
						echo '<form action="proses_form.php" method="POST" >
						Jumlah Pembelian: <input type="text" name="jumlah" id="jumlah">
						<br>
						<span id="status"></span>
						</form>';
						echo '<center><button type="button" onclick="jumlah_check('.$new_array5[$i]['id'].')">Add To Shooping Bag</button><center></div>';
						echo "<br>";
						echo "<br>";
						echo "<br>";
						echo '</div>';
					}
				?>
		    </div>
		</div>		
				
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
