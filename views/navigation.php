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
            <link rel="stylesheet" type="text/css" href="auction.css" />
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
                    <!-- <a class="navbar-brand p_ftLogo" href="home.php">Vans</a> -->
                    <a class="navbar-brand p_ftLogo" href="home.php">Vans</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="d-flex searchNavBar" role="search" action="render_product.php">
                        <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search" name="keywords">
                        <button class="btn btn-outline-warning" type="submit" name="valider">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                        </button>
                      </form>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 itemNavBar">
                        <li class="nav-item">
                          <a class="nav-link" aria-current="page" href="home.php">Accueil</a>
                        </li>
                        <?php
                        if(isset($_SESSION["email"])){ ?>
                        <li class="nav-item">
                          <a class="nav-link" href="product.php">Vendre</a>
                        </li>
                        <?php } ?>
                        <li class="nav-item">
                          <a class="nav-link" href="render_product.php">Annonces</a>
                        </li>
                        <?php
                      if(isset($_SESSION["email"])){ ?>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Compte
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profil.php">Profils</a></li>
                            <li><a class="dropdown-item" href="#">Historique</a></li>
                          </ul>
                        </li>
                      <?php } ?>
                      </ul>
                      <?php
                      if(!isset($_SESSION["email"])){ ?>
                        <div class="btn-right">
                          <a class="nav-link" href="login.php"><button class="btn btn-warning" type="submit">Connexion</button></a>
                          <a class="nav-link" href="register.php"><button class="btn btn-outline-warning" type="submit">Inscription</button></a>
                        </div>
                      <?php } else { ?>
                        <a class="nav-link" href="../connexion/logout.php"><button class="btn deconnexionBtn" type="submit">Deconnexion</button></a>
                      <?php }?>

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
                        <div class="miniLogo">

                            <a href="https://www.facebook.com/lebocal.academy/">
                              <svg fill="#B9B8B7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="iconsSocial">
                                <path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/>
                              </svg>
                            </a>

                            <a href="https://www.instagram.com/bocal_nice/">
                              <svg  fill="#B9B8B7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="iconsSocial">
                                <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                              </svg>
                            </a>

                            <a href="https://twitter.com/i/flow/login?redirect_after_login=%2FBocal_Nice">
                              <svg  fill="#B9B8B7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="iconsSocial">
                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/>
                              </svg>
                            </a>
                            
                            <a href="https://www.youtube.com/channel/UCYmPMKYTYTY-IxIfoATv7ew">
                              <svg  fill="#B9B8B7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="iconsSocial">
                                <path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"/>
                              </svg>
                            </a>

                        </div>
                    </div>

                    <div class="article2">
                        <h4>À propos du site</h4>
                        <a href="sous_dossier_footer/qui_sommes_nous.php">Qui sommes-nous ?</a>
                        <a href="sous_dossier_footer/contact.php">Contactez-nous</a>
                        <a href="">Mentions légales</a>
                        <a href="">Politique de Confidentialité</a>
                    </div>

                    <div class="article3">
                        <h4>Informations enchères</h4>
                        <a href="">Comment cela marche</a>
                        <a href="">Questions fréquentes</a>
                    </div>

                    <div class="article4">
                        <h4>Liens rapides</h4>
                        <a href="">Informations enchères</a>
                        <a href="">Historique des enchères</a>
                        <a href="">Nos enchères</a>
                    </div>
                </div>
            </footer>
            
        </body>
    </html>