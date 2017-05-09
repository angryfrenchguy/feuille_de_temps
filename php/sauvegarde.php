<?php
$serveur = "localhost";
$useur = "root";
$contrapass = "root";
$bd = "tada";

$conx = new mysqli($serveur, $useur, $contrapass, $bd);

if ($conx->connect_error) {
    die("échec de la connexion: " . $conx->connect_error);
}

$data = $_POST;

$lignes = array();

foreach($data[data] as $value) {
    $val = $value;
    $lignes[] = $val;
}

foreach($lignes as $key => $ligne) {
    mysqli_query($conx, 
                "INSERT INTO feuille_de_temps (idUnique, date, contrat, client, bus, odoIN, odoOUT, odoTOTAL, tempsIN, tempsOUT, tempsTOTAL, etat) VALUES ('"
                . $ligne[idUnique] .
                "','" . $ligne[date] .
                "','" . $ligne[contrat] .
                "','" . $ligne[client] .
                "','" . $ligne[bus] .
                "','" . $ligne[odoIN] .
                "','" . $ligne[odoOUT] .
                "','" . $ligne[odoTOTAL] .
                "','" . $ligne[tempsIN] .
                "','" . $ligne[tempsOUT] .
                "','" . $ligne[tempsTOTAL] .
                "','" . $ligne[etat] .
                "')
                ON DUPLICATE KEY UPDATE
                date='" . $ligne[date] .
                "', contrat='" . $ligne[contrat] .
                "', client='" . $ligne[client] .
                "', bus ='" . $ligne[bus] .
                "', odoIN ='" . $ligne[odoIN] .
                "', odoOUT ='" . $ligne[odoOUT] .
                "', odoTOTAL ='" . $ligne[odoTOTAL] .
                "', tempsIN ='" . $ligne[tempsIN] .
                "', tempsOUT ='" . $ligne[tempsOUT] .
                "', tempsTOTAL ='" . $ligne[tempsTOTAL] .
                "', etat ='" . $ligne[etat] .
                "'"
    );
}

$conx->close();

echo json_encode($_POST['data']);