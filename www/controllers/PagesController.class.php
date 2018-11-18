<?php
class PagesController{


	public function defaultAction(){

		$pseudo = "oliviapycz";

		$v = new View("homepage", "back");
		$v->assign("pseudo",$pseudo);
	}

}