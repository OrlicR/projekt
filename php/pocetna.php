<?php
$server = "localhost";
$database = "pjesme";
$username = "root";
$password = "";

//stvaranje konekcije
$conn = mysqli_connect($server, $username, $password, $database);

//provjera
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM pjesme";
$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>
