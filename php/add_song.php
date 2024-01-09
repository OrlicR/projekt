<?php
$server = "localhost";
$database = "pjesme";
$username = "root";
$password = "";

//stvaranje konekcije
$conn = mysqli_connect($server, $username, $password, $database);

//provjera konekcije
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['link']) && isset($_POST['ime']) && isset($_POST['izvodac']) && isset($_POST['zanr'])) {
    $link = mysqli_real_escape_string($conn, $_POST['link']);
    $ime = mysqli_real_escape_string($conn, $_POST['ime']);
    $izvodac = mysqli_real_escape_string($conn, $_POST['izvodac']);
    $zanr = mysqli_real_escape_string($conn, $_POST['zanr']);

    //unos podataka
    $sql = "INSERT INTO pjesme (link, ime, izvodac, zanr) VALUES ('$link', '$ime', '$izvodac', '$zanr')";

    if (mysqli_query($conn, $sql)) {
        echo "New record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: POST data not set";
}

mysqli_close($conn);
?>