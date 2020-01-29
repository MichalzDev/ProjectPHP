<?php

//Block 1
$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "auta"; 
$table = "marka"; 

//Block 2
$email= 'email';

//Block 4
$dbc= mysqli_connect($host,$user,$password, $dbase) 
or die("Unable to select database");

//Block 5
$query= "SELECT * FROM $table";
$result= mysqli_query ($dbc, $query) 
or die ('Error querying database.');

//Block 6
while ($row = mysqli_fetch_array($result)) {
$markaID= $row['markaID'];
$nazwa= $row['nazwa'];
$kraj= $row['kraj'];
$rokZalozenia = $row['rokZalozenia'];
$iloscAut = $row['iloscAut'];
//Block 7
$msg= "$markaID, $nazwa, $kraj, $rokZalozenia, $iloscAut";
mail($email,'Raport', $msg,);
echo 'Email sent to: ' . $email. '<br>';
}

//Block 8
mysqli_close($dbc);
?>