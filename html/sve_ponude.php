<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!--link rel="stylesheet" href="../css/still.css"-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>


<body style="margin: 50px; ">
    <div class="w3-container w3-red">
        <nav class="navigacija">
            <div class="w3-bar w3-black">
                 <a href="index.html" class="w3-bar-item w3-button">Početna stranica</a></li>
                 <a href="sve_ponude.html" class="w3-bar-item w3-button">Popis pjesama</a></li>
                 <a href="registracija.html" class="w3-bar-item w3-button">Registracija</a></li>
            </div>
        </nav>
    </div>

    <div lass="w3-container">
        <h1 class="w3-center w3-animate-top">Pjesme</h1>
        <table class="w3-table-all">
            <tr class="w3-red">
                <th>Naziv pjesme</th>
                <th>Izvođač</th>
                <th>Link</th>
                <th>Žanr</th>
            </tr>
        </table>

        <html>
            <head>
                <title>Display data</title>
            </head>
            <body>

                <h2>Data</h2>
                <?php
                include 'php/sve_ponude.php';
                ?>

            </body>
        </html>


</body>
</html>