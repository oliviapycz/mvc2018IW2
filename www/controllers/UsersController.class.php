<?php
class UsersController{


	public function defaultAction(){
		echo "User default";
	}


	public function addAction(){
	
		$user = new Users();

		$user->setId(1);
		// $user->setEmail("oliviapycz@gmail.com");
		// $user->setFirstname("olivia");
		$user->setLastname("PY COBLENTZ");
		// $user->setPwd("password123");
		$user->save();

		$v = new View("addUser", "front");
		
	}

	public function loginAction(){
	
		$v = new View("loginUser", "front");
		
	}

	public function forgetPasswordAction(){

		$v = new View("forgetPasswordUser", "front");
		
	}

}
