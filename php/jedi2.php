<?php
$serveur = "localhost";
$useur = "root";
$contrapass = "root";
$nomdedb = "tada";

$conn = new mysqli($serveur, $useur, $contrapass, $nomdedb);

if ($conn->connect_error) {
    die("Échec de connection : " . $conn->connect_error);
}

$info = $_POST;

mysqli_query($conn, "UPDATE fdt5 SET ligne = ligne + 1 WHERE semaine='" . $info[semaine] . "' AND ligne >= " . $info[ligne] . " ;");

mysqli_query($conn, "INSERT INTO fdt5 (ligne, semaine, date) VALUES ('" . $info[ligne] . "', '" . $info[semaine] . "','" . $info[date] . "');");

$conn->close();