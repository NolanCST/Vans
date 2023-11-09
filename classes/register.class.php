<?php

class Register {

    private string $lastname;
    private string $firstname;
    private string $email;
    private string $password;

    public function __construct ($lastname, $firstname, $email, $password) {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
    }

    public function __get ($property) {
        if ($property === "lastname") {
            return $this->lastname;
        } else if ($property === "firstname") {
            return $this->firstname;
        } else if ($property === "email") {
            return $this->email;
        } else if ($property === "password") {
            return $this->password;
        } else {
            return $this->$property;
        }
    }

    public function save () {
        $dbh = new PDO ("mysql:dbname=vans;host=127.0.0.1", "root", "");
        $query = $dbh->prepare("INSERT INTO `user` (lastname, firstname, email, password) VALUES (:lastname, :firstname, :email, :password)");
        $query->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $query->bindValue(':email', $this->email, PDO::PARAM_STR);
        $query->bindValue(':password', $this->password, PDO::PARAM_STR);
        $results = $query->execute();
        if($results){
            echo "<div class='sucess'>
                    <h3>Vous êtes inscrit avec succès.</h3>
                    <p>Cliquez ici pour vous <a href='login.php'>connecter</a></p>
                    </div>";
        }
    }
}