<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tada";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$formdata = $_POST;

$rows = array();
    

foreach($formdata[data] as $value) {
    $r = $value;
    $rows[] = $r;
}

foreach($rows as $key => $row) {
    mysqli_query($conn, 
                "INSERT INTO feuille_de_temps (idUnique, date, client, bus) VALUES ('" 
                 . $row[idUnique] .
                 "','" . $row[date] .
                 "','" . $row[client] .
                 "','" . $row[bus] .
                 "') 
                 ON DUPLICATE KEY UPDATE
                 date='" . $row[date] .
                 "', client='" . $row[client] .
                 "', bus='" . $row[bus] .
                 "'"
);
}

$conn->close(); 

echo json_encode($_POST['data']);
