<html>
<head>
 <title>Selectare salariu Rezultate</title>
  <link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Selectare salariu Rezultate</h1>
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
 
 $query = "SELECT numean, salariu
FROM angajati
WHERE salariu >= ALL (select salariu 
FROM angajati
WHERE idan IN (SELECT idan 
FROM certificare
WHERE idav IN (SELECT idav
FROM aeronave
WHERE numeav LIKE '";
$query .= $tip;
$query .= "'))) AND idan IN (SELECT idan 
FROM certificare
WHERE idav IN (SELECT idav
FROM aeronave
WHERE numeav LIKE '";
$query .= $tip;
$query .= "%'))";
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
				<th>Nume angajat</th>
				<th>Salariu</th>
			</tr>';

 for ($i=0; $i <$num_results; $i++)
 {
 $row = $result->fetch_assoc();
 echo '<tr>';
 echo '<td>'.($i+1).'</td>';
 echo '<td>'.stripslashes($row["numean"]).'</td>';
 echo '<td>'.stripslashes($row['salariu']).'</td>';
  echo '</tr>';
 }
 echo '</table>';

 $db->close();
?>
<a href="salariu.html">Inapoi la intoducerea datelor</a></li>
</body>
</html>