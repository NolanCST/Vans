<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="details_product.css" />
            <link rel="stylesheet" type="text/css" href="../style.css" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Raleway:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <title>Vans : Enchères</title>
        </head>

        <body>
            <!-- <header>
                <?php
                include __DIR__ . "/navigation.php";
                ?>
            </header> -->
            <section>
                
                <?php
$dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");

$query = $dbh->prepare("SELECT * FROM `product` p LEFT JOIN `details` d ON p.id_product = d.id_product");


$query->execute();


$results = $query->fetchAll();

foreach ($results as $result) {
    echo "<div class=\"dtails_box\">";
    echo "<h1> Informations complementaires concernant l'annonce :<br></h1>";
    echo "<h2> $result[title]</h2>"; 
    echo "<p> Marque : $result[mark]</p>";
    echo "<p> Modèle : $result[model]</p>";
    echo "<p> Puissance : $result[power]</p>";
    echo "<p> Année : $result[year]</p>";
    echo "<p> Description : $result[description]</p>";
    echo "<p> Prix de départ : $result[starting_price]</p>";
    echo "<p> Date de fin : $result[end_date]</p>";
    echo "</div>";
}
       ?>   
      
</section>
<footer>
    <?php
    // require __DIR__ . "/layouts/footer.php";
    ?>
</footer>
</body>
</html>
