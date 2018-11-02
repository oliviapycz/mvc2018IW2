<?php
class PagesController{


	public function defaultAction(){

		$pseudo = "Prof";

		$v = new View("homepage", "front");
		$v->assign("pseudo",$pseudo);
	}

}