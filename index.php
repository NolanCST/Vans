<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Raleway:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Vans Home</title>
    </head>

    <body>
        <header>
          
            <?php include('./layouts/navigation.php'); ?>
        </header>
      
        <section>
          <div class="list">
              <div class="card">

              </div>
              <div class="card">
                
             </div>  
            </div>
          <div class="filter"></div>
        </section>

        <footer>
            <?php require __DIR__."/layouts/footer.php"; ?>
        </footer>

    </body>


    <script>
        function myFunction() {
            var x;
            var r = confirm("Press OK or Cancel button");
            if (r == true) {
            x = "You pressed OK!";
        }
            else {
            x = "You pressed Cancel!";
        }
        document.getElementById("demo").innerHTML = x;
    }
    </script>

</html>
