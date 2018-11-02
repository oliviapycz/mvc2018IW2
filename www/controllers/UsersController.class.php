<?php
class UsersController{


	public function defaultAction(){
		echo "User default";
	}


	public function addAction(){
	

		$v = new View("addUser", "front");
		
	}

}
