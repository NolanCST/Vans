<?php 


class  Product {

    public string $title;
    public string $mark;
    public string $model;
    public string $power;
    public string $year;
    public string $description;
    public int $starting_price;
    public string $end_date; 
    public int $last_price;


    public function __construct ($title, $mark, $model, $power, $year, $description,$starting_price, $end_date)
    {
    $this->title=$title;
    $this->mark=$mark;
    $this->model=$model;
    $this->power=$power;
    $this->year=$year;
    $this->description=$description;
    $this->starting_price=$starting_price;
    $this->end_date=$end_date;
    }

   public function save () {
    require __DIR__."/../dataBase.php";
    $query=$dbh->prepare("INSERT INTO `product` (title,mark,model,power,year,description,starting_price, end_date) VALUES (:title,  :mark,:model, :power, :year, :description,:starting_price, :end_date)");
    $query->bindValue(':title', $this->title, PDO::PARAM_STR);
    $query->bindValue(':mark', $this->mark, PDO::PARAM_STR);
    $query->bindValue(':model', $this->model, PDO::PARAM_STR);
    $query->bindValue(':power', $this->power, PDO::PARAM_STR);
    $query->bindValue(':year', $this->year, PDO::PARAM_INT);
    $query->bindValue(':description', $this->description, PDO::PARAM_STR);
    $query->bindValue(':starting_price', $this->starting_price, PDO::PARAM_INT);
    $query->bindValue(':end_date', $this->end_date, PDO::PARAM_STR);
    $query->execute();
   }}
   