<?php
require("database.php");
 
$con = new mysqli('localhost', 'root', '', 'auta');
// get Users
$query = "SELECT * FROM samochody";
if (!$result = mysqli_query($con, $query)) {
    exit(mysqli_error($con));
}
 
$cars = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cars[] = $row;
    }
}
 
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=raport.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('samochodID', 'model', 'silnik', 'paliwo', 'nadwozie', 'marka'));
 
if (count($cars) > 0) {
    foreach ($cars as $row) {
        fputcsv($output, $row);
    }
}
?>