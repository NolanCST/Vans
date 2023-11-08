<?php 

class  Product {

    public int $starting_price;
    public int $last_price;
    public string $end_date;
    public string $model;
    public string $mark;
    public string $power;
    public string $year;
    public string $description;
  

    public function __construct ($starting_price, $end_date, $model, $mark, $power, $year, $description)
    {
       $this->starting_price=$starting_price;
       $this->end_date=$end_date;
       $this->model=$model;
       $this->mark=$mark;
       $this->power=$power;
       $this->year=$year;
       $this->description=$description;
    }


  

   public function save () {
    $dbh = new PDO("mysql:dbname=vans;host=127.0.0.1", "root", "");
    $query=$dbh->prepare("INSERT INTO `product` (starting_price, end_date,model,mark,power,year,description) VALUES (:starting_price, :end_date, :model, :mark, :power, :year, :description)");
    $query->bindValue(':starting_price', $this->starting_price, PDO::PARAM_INT);
    $query->bindValue(':end_date', $this->end_date, PDO::PARAM_INT);
    $query->bindValue(':model', $this->model, PDO::PARAM_STR);
    $query->bindValue(':mark', $this->mark, PDO::PARAM_STR);
    $query->bindValue(':power', $this->power, PDO::PARAM_STR);
    $query->bindValue(':year', $this->year, PDO::PARAM_INT);
    $query->bindValue(':description', $this->description, PDO::PARAM_STR);
    $query->execute();
   }
   


}
?>