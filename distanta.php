<html>
<head>
 <title>Selectare dupa distanta Rezultate</title>
 <link rel="stylesheet" href="stil.css">
</head>
<body>
<h1>Selectare dupa distanta Rezultate</h1>
<?php

 $dist_min=$_POST['dist_min'];
 $dist_min= trim($dist_min);
 if (!$dist_min)
 {
 echo 'Nu ati introdus distanta minima. Va rog sa incercati din nou.';
 exit;
 }
 $dist_max=$_POST['dist_max'];
 $dist_max= trim($dist_max);
 if (!$dist_max)
 {
 echo 'Nu ati introdus distanta minima. Va rog sa incercati din nou.';
 exit;
 }
 require_once('DB.php');
 $user = 'root';
 $pass = '';
 $host = 'localhost';
 $db_name = 'colocviu';
 
 $db = new mysqli($host, $user, $pass, $db_name) or die ("ERROR");
 
 $query = "SELECT * FROM zboruri where distanta BETWEEN ".$dist_min." AND ".$dist_max;
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

 $db->close();
?>
<a href="distanta.html">Inapoi la intoducerea datelor</a></li>
</body>
</html>