<?php

class Users{

  private $id;
  private $firstname;
  private $lastname;
  private $email;
  private $pwd;
  private $status = 0;
  private $role = 1;

  public function __construct(){

  }
  // l'interet des setters est de pouvoir formatter les donner
  public function setId(){
    $this->id=$id;
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
    $this->email=strtoupper(trim($email));
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