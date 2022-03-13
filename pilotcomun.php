<html>
<head>
 <title>Aeronave cu pilot comun Rezultate</title>
  <link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Aeronave cu pilot comun Rezultate</h1>
<?php
 
 require_once('DB.php');
 $user = 'root';
 $pass = '';
 $host = 'localhost';
 $db_name = 'colocviu';
 
 $db = new mysqli($host, $user, $pass, $db_name) or die ("ERROR");
 
 $query = "SELECT first.idav AS idav1, second.idav AS idav2, first.idan
FROM certificare first JOIN certificare second ON first.idan = second.idan
WHERE first.idav < second.idav";
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
				<th>Idav 1</th>
				<th>Idav 2</th>
				<th>Idan</th>
			</tr>';

 for ($i=0; $i <$num_results; $i++)
 {
 $row = $result->fetch_assoc();
 echo '<tr>';
 echo '<td>'.($i+1).'</td>';
 echo '<td>'.stripslashes($row["idav1"]).'</td>';
 echo '<td>'.stripslashes($row['idav2']).'</td>';
 echo '<td>'.stripslashes($row['idan']).'</td>';
  echo '</tr>';
 }
 echo '</table>';

 $db->close();
?>
<a href="index.html">Inapoi</a></li>
</body>
</html>