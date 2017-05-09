<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tada";
//$myFile = "/Users/general/Projets/fdt/data.json";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sth = mysqli_query($conn,"SELECT * FROM feuille_de_temps");
$rows = array();
while ($r = mysqli_fetch_assoc($sth)) {
    $rows[] = $r;
}

$jsondata = json_encode($rows, JSON_PRETTY_PRINT);

echo $jsondata;

$conn->close();
