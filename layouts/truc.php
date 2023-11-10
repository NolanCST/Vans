<?php
    // affiche les erreurs sur mac
    error_reporting(E_ALL);
    ini_set("display_errors", 1);


    class Truc {

        public function connexion(){
            $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1; port=8889", "root", "root");

            $query = $dbh->prepare("SELECT * FROM product");

            $query -> execute();

            $resultAll = $query->fetchALL();
            $this -> card ($resultAll);
        }

        public function card($tab){
/*             echo "card"; */
            /* var_dump($tab); */

            foreach($tab as $key => $element){
                
                echo "
                <div class='cardA' id='card-$key'> 
                    <div class='image'>image</div>
                    <div class='info'>";

                foreach($element as $x => $value){
        
                    if ($x == "id_product" ||$x == "starting_price" ||$x == "last_price" ||$x == "end_date" ||$x == "model" ||$x == "mark" ||$x == "power" ||$x == "year" ||$x == "description") {
                        echo $x . " : ". $value . "</br>" ;
                        
                    }
                }
                echo     
                    "</div>
                </div>";
            }
        }
    }
    $myList = new Truc();
    $myList -> connexion();


?>