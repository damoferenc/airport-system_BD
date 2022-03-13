<html>
<head>
 <title>Selectare dupa aeronave Rezultate</title>
  <link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Selectare dupa aeronave Rezultate</h1>
<?php

 $tip=$_POST['tip'];
 $tip= trim($tip);
 if (!$tip)
 {
 echo 'Nu ati introdus tipul de aeronava. Va rog sa incercati din nou.';
 exit;
 }
 
 require_once('DB.php');
 $user = 'root';
 $pass = '';
 $host = 'localhost';
 $db_name = 'colocviu';
 
 $db = new mysqli($host, $user, $pass, $db_name) or die ("ERROR");
 
 $query = "SELECT z.nrz, z.de_la, z.la, z.distanta, a.idav, a.numeav, a.gama_croaziera FROM zboruri z CROSS JOIN aeronave a WHERE z.distanta < a.gama_croaziera AND a.numeav LIKE UPPER('".$tip."%')";
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
				<th>Idav</th>
				<th>Nume aeronava</th>
				<th>Gama croaziera</th>
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
 echo '<td>'.stripslashes($row['idav']).'</td>';
 echo '<td>'.stripslashes($row['numeav']).'</td>';
 echo '<td>'.stripslashes($row['gama_croaziera']).'</td>';
  echo '</tr>';
 }
 echo '</table>';
 $db->close();
?>
<a href="aeronava.html">Inapoi la intoducerea datelor</a></li>
</body>
</html>