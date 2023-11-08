<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat:ital,wght@0,200;0,700;0,900;1,100;1,200&family=Raleway:ital,wght@0,100;0,300;0,400;0,600;1,100&family=Roboto&family=Tangerine:wght@700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Vans Home</title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg p_bgGreen" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand p_ftLogo" href="index.php">Vans</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="product.php">Enchères</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Historique</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Inscription</a>
                            </li>

                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>

                    </div>
                </div>
            </nav>
        </header>
        <main>

            <?php

            require __DIR__ . "/views/form_product.php";
            require __DIR__ . "/classes/products.class.php";


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $myProduct = new Produits(
                    $_POST["starting_price"],
                    $_POST["last_price"],
                    $_POST["end_date"],
                    $_POST["model"],
                    $_POST["mark"],
                    $_POST["power"],
                    $_POST["year"],
                    $_POST["description"]
                );
                $myProduct->sauvegarde();
            }


            $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");

            $query = $dbh->prepare("SELECT * FROM product");


            $query->execute();


            $results = $query->fetchAll();

            foreach ($results as $result) {
                echo "<h1> N° $result[id]: Starting price : $result[starting_price]</h1>";
                echo "<h1> Last price:  $result[last_price]</h1>";
                echo "<h1> end_date : $result[end_date]</h1>";
                echo "<h1> model : $result[model]</h1>";
                echo "<h1> mark : $result[mark]</h1>";
                echo "<h1> power : $result[power]</h1>";
                echo "<h1> year : $result[year]</h1>";
                echo "<h1> description : $result[description]</h1>";
                echo "<h1> ___________________</h1>";
            }
            ?>

            </h1>
        </main>
    </body>
</html>