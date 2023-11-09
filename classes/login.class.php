<?php

class Login {

    public string $email;
    public string $password;

    public function __construt ($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    public function verification () {
        $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");
        $query = $dbh->prepare("SELECT * FROM `user`");
        $query->execute();
        $results = $query->fetchAll();
        session_start();
        if (isset($_POST['email']) &&  isset($_POST['password'])) {
            foreach ($results as $result) {
                if (
                    $result['email'] === $_POST['email'] &&
                    $result['password'] === $_POST['password']
                ) {
                    $loggedUser = ['email' => $result['email'],];
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: /bocalAcademy/vans/index.php");
                    exit();
                } else {
                    $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $_POST['email'], $_POST['password']);
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
            Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !
            </div>
        <?php };
        }
}
?>