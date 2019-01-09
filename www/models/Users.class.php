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

  public function getFormRegister(){
    return [
      "config"=>[
        "method"=>"POST",
        "action"=>Routing::getSlug("Users", "save"),
        "class"=>"",
        "id"=>"",
        "reset"=>"Annuler",
        "submit"=>"S'enregistrer"
      ],
      "data"=>[
        "firstname"=>[
          "type"=>"text",
          "placeholder"=>"Votre prénom",
          "class"=>"form-control",
          "id"=>"firstname",
          "required"=>true,
          "minlength"=>2,
          "maxlength"=>50,
          "error"=>"Votre prénom doit faire entre 2 et 50 caractères"
        ],
        "lastname"=>[
          "type"=>"text",
          "placeholder"=>"Votre nom",
          "class"=>"form-control",
          "id"=>"lastname",
          "required"=> true,
          "minlength"=>2,
          "maxlength"=>100,
          "error"=>"Votre nom doit faire entre 2 et 100 caractères"
        ],
        "email"=>[
          "type"=>"text",
          "placeholder"=>"Votre email",
          "class"=>"form-control",
          "id"=>"email",
          "required"=> true,
          "minlength"=>7,
          "maxlength"=>250,
          "error"=>"Votre emailn'est pas correct ou fait plus de 250 caractères"
        ],
        "pwd"=>[
          "type"=>"text",
          "placeholder"=>"Votre mot de passe",
          "class"=>"form-control",
          "id"=>"pwd",
          "required"=> true,
          "minlength"=>6,
          "error"=>"Votre mot de passe doit faire plus de 6 caractères avec des minuscules, majuscules et des chiffres"
        ],
        "pwdConfirm"=>[
          "type"=>"text",
          "placeholder"=>"Retapez votre mot de passe",
          "class"=>"form-control",
          "id"=>"pwdConfirm",
          "required"=> true,
          "confirm"=>"pwd",
          "error"=>"Le mot de passe ne correspond pas"
        ]
      ]
    ];
  }
  
}