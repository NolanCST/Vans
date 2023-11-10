<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style.css" />
        <link rel="stylesheet" type="text/css" href="connexion.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Raleway:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Vans Connexion</title>
    </head>
    <body>
        <header>
            <?php include __DIR__."/../layouts/navigation.php"; ?>
        </header>
        <main>
        <?php

        require __DIR__."/form_login.php";

        require __DIR__."/../classes/login.class.php";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $logUser = new Login ($_POST["email"], $_POST["password"]);
            $logUser->verification();
        }
        ?>
        </main>
    </body>
</html>