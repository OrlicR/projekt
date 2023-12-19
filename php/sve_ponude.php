<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arhiva pjesma</title>
    <!--link rel="stylesheet" href="../css/still.css"-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>


<body>
    <div class="w3-container w3-red">
        <nav class="navigacija">
            <div class="w3-bar w3-black">
                 <a href="index.html" class="w3-bar-item w3-button">Početna stranica</a></li>
                 <a href="sve_ponude.html" class="w3-bar-item w3-button">Sve pjesme</a></li>
                 <a href="registracija.html" class="w3-bar-item w3-button">Registracija</a></li>
            </div>
        </nav>
    </div>

    <div lass="w3-container">
        <h1 class="w3-center w3-animate-top">Pjesme</h1>
        <?php
        $server = "localhost";
        $database = "pjesme";
        $username = "root";
        $password = "";
        
        $conn = mysqli_connect($server, $username, $password, $database);
        $query = "SELECT * FROM naziv";
        $res = mysqli_query($conn, $query);
        ?>

        <table class="w3-table-all">

            <tr class="w3-red">
                <th>Naziv pjesme</th>
                <th>Izvođač </th>
                <th>Link</th>
                <th>Žanr</th>
            </tr>

            <?php
            while($row = mysqli_fetch_array($res)){
                echo "<tr>";
                echo "<td>".$row['Link']."</td>";
                echo "<td>".$row['Naziv_pjesme']."</td>";
                echo "<td>".$row['Izvodac']."</td>";
                echo "<td>".$row['Zanr']."</td>";
                echo "</tr>";
            }
            mysqli_close($conn);
            ?>
        </table>
</body>
</html>