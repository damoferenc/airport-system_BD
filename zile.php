<html>
<head>
 <title>Selectare dupa zile Rezultate</title>
 <link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Selectare dupa zile Rezultate</h1>
<?php

 $zi = $_GET['zi'];
 
 
 require_once('DB.php');
 $user = 'root';
 $pass = '';
 $host = 'localhost';
 $db_name = 'colocviu';
 
 $db = new mysqli($host, $user, $pass, $db_name) or die ("ERROR");
 
 $query = "SELECT *
FROM zboruri
WHERE zi IN (";
 $gol = true;
foreach ($zi as $ziua){ 
    $query .= "'";
	$query .= $ziua;
	$query .= "',";
	$gol = false;
}
if($gol){
	echo "Nu ati introdus ninci o valoare, va rog sa incercati din nou.";
}
else{
		$query = substr($query, 0, -1);
		$query .= ") ORDER BY plecare";
		$result = $db->query($query);


	 if (DB::isError($result))
	 {
	 echo $db->getMessage();
	 exit;
	 }
	 
	 $num_results = $result->num_rows;

	 echo '<table id="date">';
	 echo '	<tr>
				<th></th>
				<th>Nrz</th>
				<th>De la</th>
				<th>La</th>
				<th>Distanta</th>
				<th>Plecare</th>
				<th>Sosire</th>
				<th>Zi</th>
			</tr>';

		for ($i=0; $i <$num_results; $i++)
	 {
	 $row = $result->fetch_assoc();
	 echo '<tr>';
	 echo '<td>'.($i+1).'</td>';
	 echo '<td>'.stripslashes($row["nrz"]).'</td>';
	 echo '<td>'.stripslashes($row['de_la']).'</td>';
	  echo '<td>'.stripslashes($row['la']).'</td>';
	 echo '<td>'.stripslashes($row['distanta']).'</td>';
	 echo '<td>'.stripslashes($row['plecare']).'</td>';
	 echo '<td>'.stripslashes($row['sosire']).'</td>';
	 echo '<td>'.stripslashes($row['zi']).'</td>';
	 echo '</tr>';
	 }
	 echo '</table>';
}
	
	$db->close();
?>
<a href="zile.html">Inapoi la intoducerea datelor</a></li>
</body>
</html>