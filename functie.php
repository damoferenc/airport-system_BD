<html>
<head>
 <title>Salariu mediu Rezultate</title>
 <link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Salariu mediu dupa functie Rezultate</h1>
<?php
 
 require_once('DB.php');
 $user = 'root';
 $pass = '';
 $host = 'localhost';
 $db_name = 'colocviu';
 
 $db = new mysqli($host, $user, $pass, $db_name) or die ("ERROR");
 
 $query = "SELECT functie, AVG(salariu) AS salariu_mediu
FROM angajati
GROUP BY functie";
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
				<th>Functie</th>
				<th>Salariu mediu</th>
			</tr>';

 for ($i=0; $i <$num_results; $i++)
 {
 $row = $result->fetch_assoc();
 echo '<tr>';
 echo '<td>'.($i+1).'</td>';
 echo '<td>'.stripslashes($row["functie"]).'</td>';
 echo '<td>'.stripslashes($row['salariu_mediu']).'</td>';
  echo '</tr>';
 }
 echo '</table>';

 $db->close();
?>
<a href="index.html">Inapoi</a></li>
</body>
</html>