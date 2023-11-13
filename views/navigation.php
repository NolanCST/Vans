<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="product.css" />
            <link rel="stylesheet" type="text/css" href="connexion.css" />
            <link rel="stylesheet" type="text/css" href="render_product.css" />
            <link rel="stylesheet" type="text/css" href="style.css" />
            <link rel="stylesheet" type="text/css" href="details_product.css" />
            <link rel="stylesheet" type="text/css" href="profil.css" />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Ms+Madi&family=Raleway:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <title>Vans</title>
        </head>

        <body>
            <!-- Navbar -->
            <header class="header">
                <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top p_bgGreen" data-bs-theme="dark">
                  <div class="container-fluid">
                    <a class="navbar-brand p_ftLogo" href="home.php">Vans</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="home.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="product.php">Vendre</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="render_product.php">Annonces</a>
                        </li>
                        
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Compte
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profil.php">Profils</a></li>
                            <li><a class="dropdown-item" href="#">Historique</a></li>
                            <li><a class="dropdown-item" href="login.php">Connexion</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../connexion/logout.php">Déconnexion</a></li>
                          </ul>
                        </li>
                      </ul>
                      <a class="nav-link" href="register.php"><button class="btn btn-outline-warning" type="submit">Inscription</button></a>
                      
                      <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form> -->
                    </div>
                    
                  </div>
                </nav>
            </header>
            <!-- Main : contenu des pages -->
            <main>
                <?php echo $content; ?>
            </main>
            <!-- Footer -->
            <footer>
                <div class="aide">
                    <div class="article1">
                        <p class="p_ftLogo1">Vans</p>
                        <div class="MiniLogo">
                            <img class="Logo-FB" src="/images/facebook.svg" />
                            <img class="Logo-Insta" src="/images/instagram.svg" />
                            <img class="Logo-Twit" src="/images/twitter.svg" />
                            <img class="Logo-You" src="/images/youtube.svg" />
                        </div>
                    </div>

                    <div class="article2">
                        <h4>À propos du site</h4>
                        <p>Qui sommes-nous ?</p>
                        <p>Contactez-nous</p>
                        <p>Mentions légales</p>
                        <p>Politique de Confidentialité</p>
                    </div>

                    <div class="article3">
                        <h4>Informations enchères</h4>
                        <p>Comment cela marche</p>
                        <p>Questions fréquentes</p>
                    </div>

                    <div class="article4">
                        <h4>Liens rapides</h4>
                        <p>Accueil</p>
                        <p>Historique des enchères</p>
                        <p>Nos enchères</p>
                    </div>
                </div>
            </footer>
            
        </body>
    </html>