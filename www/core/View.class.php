<?php
class View{

	private $v;
	private $t;
	private $data = [];

	public function __construct($v, $t="back"){
		$this->setView($v);
		$this->setTemplate($t);
	}


	public function setView($v){
		$pathView = "views/".$v.".view.php";
		if(file_exists($pathView)){
			$this->v = $pathView;	
		}else{
			die("La vue n'existe pas :".$pathView);
		}
	}
	public function setTemplate($t){
		$pathTemplate = "views/templates/".$t.".tpl.php";
		if(file_exists($pathTemplate)){
			$this->t = $pathTemplate;	
		}else{
			die("Le template n'existe pas :".$pathTemplate);
		}
	}

	public function addModal($modal, $config){
		$pathModal = "views/modals/".$modal.".mod.php";
		if(file_exists($pathModal)){
			include $pathModal;	
		}else{
			die("Le modal n'existe pas :".$pathModal);
		}
	}

	public function assign($key, $value){
		// on donne une clé et une valeur
		// vient alimenter un tableau php qui s'appelle data
		$this->data[$key]=$value;
	}

	public function __destruct(){
		// appelé à la fin de tous process
		// tous les classes instanciées sont détruites
		extract($this->data);
		include $this->t;
	}

}



