<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="product.css" />
            <link rel="stylesheet" type="text/css" href="style.css" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Raleway:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet"> 
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <title>Vans : Home</title>
        </head>
        <body>
            <header>
                <?php
                require __DIR__ . "./layouts/navigation.php";
                ?>
            </header>

            <main>
                <section>
                  <div class="list" >
                        <?php 
                            require __DIR__ . "/layouts/truc.php";
                        ?>
                    </div>
                  <div class="filter"></div>
                </section>
            </main>
                  <footer>
                    <?php
                    require __DIR__ . "./layouts/footer.php";
                    ?>
                  </footer>
        </body>
        <script>
            let r = false;

            let doc = document.querySelectorAll(".cardA");

            doc.forEach( box => {
                box.addEventListener("click", function(e){
                    console.log("hello", box );
                    console.log("hello", e.target.parentElement.id );

                    if(r == true || r == null){
                        box.classList.remove("active");
                        document.querySelector(".list").classList.remove("active");
                        r = false;
                    } else if (r == false ){
                        box.classList.add("active");
                        document.querySelector(".list").classList.add("active");
                        r = true;
                    }
                }); 
            })
        </script>
  </html>
