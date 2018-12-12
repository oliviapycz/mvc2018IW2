<?php

class Users extends BaseSQL {

  public $id = null;
  public $firstname;
  public $lastname;
  public $email;
  public $pwd;
  public $status = 0;
  public $role = 1;

  public function __construct(){
    // permet d'appeler le construct de la classe BaseSQL
    parent::__construct();
  }

  // l'interet des setters est de pouvoir formatter les donner
  public function setId($id){
    $this->id=$id;
    //Alimentation de l'objet (this) depuis la bdd ou l'id correspond
    $this->getOneBy(["id"=>$id], true);
  }

  public function setFirstname($firstname){
    $this->firstname=ucwords(strtolower(trim($firstname)));
    // trim supprime espace en début et fin de chaîne
    // strtolower met tout en minuscule
    // ucwords met toutes les 1eres lettre de chaque mots en majuscule
  }

  public function setLastname($lastname){
    $this->lastname=strtoupper(trim($lastname));
  }

  public function setEmail($email){
    $this->email=strtolower(trim($email));
  }

  public function setPwd($pwd){
    $this->pwd=password_hash($pwd, PASSWORD_DEFAULT);
    // PASSWORD_DEFAULT est une constante (pas variable car pas de $)
  }

  public function setStatus($status){
    $this->status=$status;
  }

  public function setRole($role){
    $this->role=$role;
  }
  
}