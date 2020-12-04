<?php

abstract class ModelManager{
    private $bdd;
    
    //contructeur --> connection a la bdd
    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=live-37_teobou_CupOfTea;charset=utf8','teobou','c9275896YTQ4Nzc0N2M3MmIzODAzOWYyZTE5OTU33051ecbf');
    }
    public function queryOne($query,array $params = []){
        //methode qui va chercher UNE donnée en BDD
        $query = $this->bdd->prepare($query);
        $query ->execute($params);
        $result = $query->fetch();
       // var_dump($query->errorInfo());
        return $result;
        
        
    }
    
    public function queryAll($query,array $params = []){
        //methode qui va chercher UNE donnée en BDD
        $query = $this->bdd->prepare($query);
        $query ->execute($params);
        $results = $query->fetchAll();
       // var_dump($query->errorInfo());
        return $results;
        
        
    }
    public function query($query,array $params = []){
        $query = $this->bdd->prepare($query);
        $query ->execute($params);
       // var_dump($query->errorInfo());
    }
}


