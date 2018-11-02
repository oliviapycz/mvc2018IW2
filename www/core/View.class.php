<?php
class View{

	private $v;
	private $t;
	private $data;

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

	public function assign($key, $value){
		$this->data[$key]=$value;
	}

	public function __destruct(){
		extract($this->data);
		include $this->t;
	}

}



