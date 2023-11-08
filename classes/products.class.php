<?php 


class  Produits {

    public int $starting_price;
    public int $last_price;
    public string $end_date;
    public string $model;
    public string $mark;
    public string $power;
    public string $year;
    public string $description;
  

    public function __construct ($starting_price, $last_price, $end_date, $model, $mark, $power, $year, $description)
    {
       $this->starting_price=$starting_price;
       $this->last_price=$last_price;
       $this->end_date=$end_date;
       $this->model=$model;
       $this->mark=$mark;
       $this->power=$power;
       $this->year=$year;
       $this->description=$description;
    }


    public function sauvegarde() {
    $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");

    $query = $dbh->prepare("INSERT INTO `product`(starting_price, last_price, end_date, , mode, mark, power, year ,description) VALUE (? , ? ,? ,?,?,?,?,?)");
    $results = $query->execute([$this->starting_price, $this->last_price, $this->end_date,$this->model,$this->mark,$this->power, $this->year,$this->description ]);
    echo "(Ça marche)
    Bras dessus et bras dessous <br>
    (Ça marche)
    L'un sur l'autre dans la boue<br>
    (Ça marche)
    Tant qu'on peut encore debout<br>
    Monter les marches";
}}
?>