		<?php include('header.php'); ?>

		<?php
			include('database_connection.php'); 
			if(!isset($_GET["sort"])|| !isset($_GET["order"])){
				$result = mysql_query("select * from catalog_product where category = 'buah' order by name Asc");
				$result1 = mysql_query("select path from catalog_product where category = 'buah' order by name Asc");
			}else{
				$result = mysql_query("select * from catalog_product where category = 'buah' order by ".$_GET["sort"]." ".$_GET["order"]);
				$result1 = mysql_query("select path from catalog_product where category = 'buah' order by ".$_GET["sort"]." ".$_GET["order"]);
			}
			while ($row = mysql_fetch_array($result)) {
			    $new_array[] = $row;
			}
			while ($row1 = mysql_fetch_array($result1)) {
			    $new_array1[] = $row1;
			}
			$a = mysql_num_rows($result);
			mysql_close($bd);// close mysql then do other job with set_time_limit(59)
		?>

		<div id="apa">
			<br>
			<script>
				function gantiUrutan(){
					var a = document.getElementById("comboA").value;
					var b = document.getElementById("comboB").value;
					window.location.href = "buah.php?sort=" + a + "&order=" + b;
				}
				
			</script>
						
			<?php
				echo '<p> Urut Berdasarkan : 
					<select id="comboA">
						<option value="name">nama</option>
						<option value="price">harga</option>
					</select>
					<select id="comboB">
						<option value="Asc">Asc</option>
						<option value="Desc">Desc</option>
					</select>
					<button type="button" onclick="gantiUrutan()">Ok</button><br><br><p>';
					
				for($i=0; $i<10&&$i<$a; $i++){
					echo '<img src=".'.$new_array1[$i]['path'].'" width="250" height="250">';
					echo '<div class="ex"><center><a href="Detail_Barang.php?id='.$new_array[$i]['id'].'">'.$new_array[$i]['name'].'</a><center>';
					echo $new_array[$i]['price'];
					echo '<form action="proses_form.php" method="POST" >
					Jumlah Pembelian: <input type="text" name="jumlah" id="jumlah">
					<br>
					<span id="status"></span>
					</form>';
					echo '<center><button type="button" onclick="jumlah_check('.$new_array[$i]['id'].')">Add To Shooping Bag</button><center></div>';
					echo "<br>";
					echo "<br>";
					echo "<br>";
				}
			?>
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
		<script>
			 var nama_barang = [];
			 var image = [];
			 var harga = [];
			 var id = [];
			 var b;
			 
			 <?php
				for ($i=0; $i < count($new_array); $i++){
					echo "image[".$i."] = '".$new_array1[$i]['path']."';\n";
					echo "nama_barang[".$i."] ='".$new_array[$i]['name']."';\n";
					echo "harga[".$i."] = '".$new_array[$i]['price']."';\n";
					echo "id[".$i."] = '".$new_array[$i]['id']."';\n";
				}
				echo "b = '".$a."';\n";
			 ?>
				
				var page = 1;
				
				document.addEventListener('scroll', function (event) {
				if (document.body.scrollHeight == 
				document.body.scrollTop +        
				window.innerHeight) {
					
					var apa = document.getElementById("apa");
					for(var i = page*10; (i < page*10+10 && i < b); i++){
						var s = ""
						s += '<img src="'+image[i]+'" width="250" height="250">'+"<br/>";
						s += '<div class="ex"><center><a href="Detail_Barang.php?id='+id[i]+'">'+nama_barang[i]+'</a><center>';
						s += harga[i]+"<br/>";
						s += 	'<form action="proses_form.php" method="POST" >';
						s +=	'Jumlah Pembelian: <input type="text" name="jumlah" id="jumlah">'+ "<br/>";
						s +=	'<span id="status"></span>';
						s += 	'</form>';
						s += '<center><button type="button" onclick="jumlah_check('+id[i]+')">Add To Shooping Bag</button><center></div>'+ "<br/>"+ "<br/>"+ "<br/>";
						apa.innerHTML += s;
					}
						
					page++;
				}
			});
		</script>
	</body>
</html>
