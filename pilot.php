<html>
<head>
 <title>Selectare aeronave dupa pilot Rezultate</title>
 <link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Selectare aeronave dupa pilot Rezultate</h1>
<?php

 $pilot=$_POST['pilot'];
 $pilot= trim($pilot);
 if (!$pilot)
 {
 echo 'Nu ati introdus pilotul. Va rog sa incercati din nou.';
 exit;
 }
 
 require_once('DB.php');
 $user = 'root';
 $pass = '';
 $host = 'localhost';
 $db_name = 'colocviu';
 
 $db = new mysqli($host, $user, $pass, $db_name) or die ("ERROR");
 
 $query = "SELECT *
FROM aeronave
WHERE idav IN (SELECT idav
FROM certificare
WHERE idan = cautaIdan('";
$query .=$pilot;
$query .="'))";

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
				<th>Idav</th>
				<th>Nume aeronava</th>
				<th>Gama croaziera</th>
			</tr>';

 for ($i=0; $i <$num_results; $i++)
 {
 $row = $result->fetch_assoc();
 echo '<tr>';
 echo '<td>'.($i+1).'</td>';
 echo '<td>'.stripslashes($row["idav"]).'</td>';
 echo '<td>'.stripslashes($row['numeav']).'</td>';
 echo '<td>'.stripslashes($row['gama_croaziera']).'</td>';
  echo '</tr>';
 }
 echo '</table>';

 $db->close();
?>
<a href="pilot.html">Inapoi la intoducerea datelor</a></li>
</body>
</html>