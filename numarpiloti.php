<html>
<head>
 <title>Numar piloti Rezultate</title>
 <link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Numar piloti pentru fiecare aeronava Rezultate</h1>
<?php
 
 require_once('DB.php');
 $user = 'root';
 $pass = '';
 $host = 'localhost';
 $db_name = 'colocviu';
 
 $db = new mysqli($host, $user, $pass, $db_name) or die ("ERROR");
 
 $query = "SELECT a.numeav, COUNT(c.idan) AS numar_piloti
FROM aeronave a CROSS JOIN certificare c
WHERE a.idav = c.idav
GROUP BY a.numeav";
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
				<th>Nume aeronava</th>
				<th>Numar piloti</th>
			</tr>';

 for ($i=0; $i <$num_results; $i++)
 {
 $row = $result->fetch_assoc();
 echo '<tr>';
 echo '<td>'.($i+1).'</td>';
 echo '<td>'.stripslashes($row["numeav"]).'</td>';
 echo '<td>'.stripslashes($row['numar_piloti']).'</td>';
  echo '</tr>';
 }
 echo '</table>';

 $db->close();
?>
<a href="index.html">Inapoi</a></li>
</body>
</html>