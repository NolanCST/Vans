$dbh = new PDO("mysql:dbname=bocal_shop3;host=127.0.0.1", "root", "");
        $query = $dbh->prepare("SELECT * FROM `administrateur`");
        $query->execute();
        $results = $query->fetchAll();
        session_start();
        if (isset($_POST['nom']) &&  isset($_POST['mot_de_passe'])) {
            foreach ($results as $result) {
                if (
                    $result['nom'] === $_POST['nom'] &&
                    $result['mot_de_passe'] === $_POST['mot_de_passe']
                ) {
                    $loggedUser = ['nom' => $result['nom'],];
                    $_SESSION['nom'] = $_POST['nom'];
                    header("Location: /bocalAcademy/bocalShop3/index.php");
                    exit();
                } else {
                    $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $_POST['nom'], $_POST['mot_de_passe']);
                }
            }
        }
        if(!isset($loggedUser)){
            if(isset($errorMessage)) { ?>
                <div class="alert alert-danger" role="alert">
                <?php echo $errorMessage; ?>
                </div>
        <?php };
        } else { ?>
            <div class="alert alert-success" role="alert">
            Bonjour <?php echo $loggedUser['nom']; ?> et bienvenue sur le site !
            </div>
        <?php }; ?>