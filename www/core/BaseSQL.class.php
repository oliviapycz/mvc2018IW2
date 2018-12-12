<?php

class BaseSQL {

  private $pdo; 
  private $table;

  public function __construct(){
    // A CONNAITRE PAR COEUR
    // PDO -> PHP Data Object
    // PHP -> PHP Hypertext Preprocessor

    // Avec un singleton c'est mieux....
    try{
      $this->pdo = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPWD);
    }catch(Exception $e){
      die(" Erreur SQL : ".$e->getMessage());
    }
    // récuperer le nom de la class qui est aussi le nom de la table
    //on procède dans le constructeur car on aura besoin de cette variable partout
    $this->table = get_called_class();
  }

  public function getColumns() {
    // on récupère toutes les variables parent et enfants
    $objectVars = get_object_vars($this);
    // on récupère seulement les variables du parent
    $classVars = get_class_vars( get_class() );
    // on compare les 2 tableaux récupérés
    // pour ne garder que les éléments communs (ni pdo, ni table du parent)
    $columns = array_diff_key($objectVars, $classVars);
    return $columns;
    
  }

  // Dynamique en fonction de l'enfant qui en hérite
  public function save(){
    $columns = $this->getColumns();
    if( is_null($columns["id"]) ){
      # INSERT
      $sql = "INSERT INTO ".$this->table." (".implode(",", array_keys($columns)).")
      VALUES (:".implode(",:", array_keys($columns)).")";
      // echo $sql;
      $query = $this->pdo->prepare($sql);
      $query->execute( $columns );
    }else{
      # UPDATE
      foreach ($columns as $key => $value) {
        $sqlSet[] = "".$key." =:".$key."";
      }
      $sql = "UPDATE ".$this->table."
      SET ".implode(",", $sqlSet)." WHERE id=:id";
      echo $sql;
      $query = $this->pdo->prepare($sql);
      $query->execute( $columns );
    }
  }
  // de type $where=["id"=>3]
  public function getOneBy($where){
    $columns = $this->getColumns();     

    foreach ($where as $key => $value) {
      $sqlWhere[] = "".$key." =:".$key."";
    }
    $sql = "SELECT FROM ".$this->table."
      WHERE ".implode(" AND ", $sqlWhere)."";
      echo $sql;
      $query = $this->pdo->prepare($sql);
      $query->execute( $where );
      $query->setFetchMode(PDO::FETCH_INTO, $this);
      $query->fetch();
  }

}