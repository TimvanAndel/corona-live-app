<?php

$servername = "localhost";
$username = "u91560p86659_corona";
$password = "wachtwoord";
$dbname = "u91560p86659_corona";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT berichten.id AS berichten_id, bericht, breedtegraad, hoogtegraad, gebruikers.voornaam, action_id FROM `berichten` 
INNER JOIN gebruikers ON berichten.gebruiker_id = gebruikers.id 
INNER JOIN action ON berichten.action_id = action.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $rows = [];
    foreach ($result as $row) {
        $rows[] = [
            'id' => $row['berichten_id'],
            'sender' => $row['voornaam'],
            'desc' => $row['bericht'],
            'lat' => $row['breedtegraad'],
            'lng' => $row['hoogtegraad'],
            'action' => $row['action_id']
        ];
    }
}
echo '{
    "markers" : ';
print json_encode($rows);
echo ',"actions": ';

$sql = "SELECT * FROM action";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $rows = [];
    foreach ($result as $row) {
        $rows[] = [
            'id' => $row['id'],
            'action' => $row['name'],
            'filename' => $row['filename'],
            'scale' => $row['scale']
        ];
    }
    print json_encode($rows);
}
echo "}";
$conn->close();