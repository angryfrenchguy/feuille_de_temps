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
                "INSERT INTO fdt4 (id, date, contrat, client, bus, odoIN, odoOUT, odoTOTAL, tempsIN, tempsOUT, tempsTOTAL, etat) VALUES (" 
                 . $row[id] .
                 ",'" . $row[date] .
                 "','" . $row[contrat] .
                 "','" . $row[client] .
                 "','" . $row[bus] .
                 "','" . $row[odoIN] .
                 "','" . $row[odoOUT] .
                 "','" . $row[odoTOTAL] .
                 "','" . $row[tempsIN] .
                 "','" . $row[tempsOUT] .
                 "','" . $row[tempsTOTAL] .
                 "','" . $row[etat] .
                 "') 
                 ON DUPLICATE KEY UPDATE
                 date='" . $row[date] .
                 "', contrat='" . $row[contrat] .
                 "', client='" . $row[client] .
                 "', bus='" . $row[bus] .
                 "', odoIN='" . $row[odoIN] .
                 "', odoOUT='" . $row[odoOUT] .
                 "', odoTOTAL='" . $row[odoTOTAL] .
                 "', tempsIN='" . $row[tempsIN] .
                 "', tempsOUT='" . $row[tempsOUT] .
                 "', tempsTOTAL='" . $row[tempsTOTAL] .
                 "', etat='" . $row[etat] .
                 "'"
);
}

//foreach($rows as $key => $row) {
//     mysqli_query($conn, 
//                  "UPDATE fdt4 
//                  SET date='" . $row[date] .
//                  "', contrat='" . $row[contrat] .
//                  "', contrat='" . $row[contrat] .
//                  "', bus='" . $row[bus] .
//                  "', odoIN='" . $row[odoIN] .
//                  "', odoOUT='" . $row[odoOUT] .
//                  "', odoTOTAL='" . $row[odoTOTAL] .
//                  "', tempsIN='" . $row[tempsIN] .
//                  "', tempsOUT='" . $row[tempsOUT] .
//                  "', tempsTOTAL='" . $row[tempsTOTAL] .
//                  "' WHERE id='" . $row[id] . "'"
//                 );
//} 

$conn->close();         
