<?php
    // affiche les erreurs sur mac
    error_reporting(E_ALL);
    ini_set("display_errors", 1);


    class Truc {

        public function connexion(){
            require __DIR__ ."/../database.php";

            $query = $dbh->prepare("SELECT * FROM ( SELECT * FROM `product` ORDER BY `id_product` DESC LIMIT 10 ) sub ORDER BY `id_product` ASC;");

            $query -> execute();

            $resultAll = $query->fetchALL();
            $this -> card ($resultAll);
        }

        public function getImage($id){

            require __DIR__ ."/../database.php";
            $bdd = $dbh->prepare("SELECT `image` FROM `product` WHERE id_product = :id");
            $bdd -> bindValue(':id', $id);
            $bdd -> execute();
        }

        public function card($tab){
            foreach($tab as $key => $element){
                
                echo "
                <div class='cardA' id='card-$key'> 
                    <div class='image'></div>
                    <div class='info'>";

                foreach($element as $x => $value){

                    if ($x == "title" || $x == "id_product" ||$x == "starting_price" ||$x == "last_price" ||$x == "end_date" ||$x == "model" ||$x == "mark" ||$x == "power" ||$x == "year" ||$x == "description" ||$x == "image") {
                        
                        if($x == "last_price" || $x == "starting_price"){
                            if($x == "last_price"){
                                echo "<div class='cla-$x'> Dernier prix : ". $value . " €</div>" ;
                            } else {
                                echo "<div class='cla-$x'>". $x . " : ". $value . " €</div>" ;
                            }
                            
                        } else if ($x == "power"){
                            echo "<div class='cla-$x'>". $x . " : ". $value . " ch</div>" ;


                        } else if($x == 'id_product'){
                            echo "<div class='cla-$x'> <img src='". $this->getImage($x) ."'></div>";


                        } else {
                            
                            if($x == 'end_date'){
                                echo "<div class='cla-$x'> Date de fin d'enchére : ". $value . " </div>" ;
                            } else if ($x == 'title') {
                                echo "<div class='cla-$x'> Titre : ". $value . " </div>" ;
                            } else {
                                echo "<div class='cla-$x'>". $x . " : ". $value . " </div>" ;
                            }
                            
                        }
                    }
                }
                echo     
                    "</div>
                    <div class='formNewPrice'>
                        <form action='' method='post'>
                            <input type='number' name='new_valeur' id='new_valeur' placeholder='votre prix'>
                            <button type='submit'>valider</button>
                        </form>
                    </div>
                </div>";
            }
        }
    }
    $myList = new Truc();
    $myList -> connexion();


?>

<?php
/* 
     // ajout image dans dossier 

     //recuper info 
    if(isset($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        $type = $_FILES['file']['type'];

        // coupe en deux le $name exemple,  salon.jpg => ['salon', 'jpg']
        $tabExtension = explode('.', $name);
        // recupere la derniere valeur de $tabExtension et la met en minuscule
        $extension = strtolower(end($tabExtension));

        // tableau des extensions qu'on autorise
        $extensionsAutorisees = ['jpeg', 'jpg', 'gif', 'png'];
        $tailleMax = 65536;


        if (in_array($extension, $extensionsAutorisees) && $size <= $tailleMax && $error == 0){
            
            // ajout caractere au id pour etre unique 
            $uniqueName = uniqid('', true);
            $fileName = $uniqueName. '.' .$extension;

            var_dump($fileName);

            //telecharge et place l'image dans le dossier upload
            move_uploaded_file($tmpName, '../upload/'.$fileName);

            $req = $dbh->prepare('INSERT INTO product (nameImage) VALUES (?)');
            $req->execute([$fileName]);
        
        } else {
            echo 'mauvaise extension ou taille trop importante ou erreur du fichier';
        } */

/* } */
?>

<!-- <form action="" method="post" enctype="multipart/form-data">
    <label for="file">fichier</label>
    <input type="file" name="file">
    <button type="submit">enregistrer</button>
</form> -->