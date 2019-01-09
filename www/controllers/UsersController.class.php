<?php
class UsersController{


	public function defaultAction(){
		echo "User default";
	}


	public function addAction(){
	
		$user = new Users();

		// $user->setId(1);
		// $user->setEmail("oliviapycz@gmail.com");
		// $user->setFirstname("olivia");
		// $user->setLastname("PY COBLENTZ");
		// $user->setPwd("password123");
		// $user->save();

		$v = new View("addUser", "front");
		$v->assign("configFormRegister", $user->getFormRegister());
	}

	public function saveAction(){

		$user = new Users();
		$configForm = $user->getFormRegister();
		$method = strtoupper($configForm["config"]["method"]);
		$v = new View("addUser", "front");
		$v->assign("configFormRegister", $configForm);
		$data = $GLOBALS["_".$method];

		if($_SERVER["REQUEST_METHOD"]==$method && !empty($data)) {

			$validator = new Validator($configForm, $data);
			print_r($validator->errors);
			$configForm["errors"] = $validator->errors;

			if (empty($configForm["errors"])) {
				$user->setFirstname($data["firstname"]);
				$user->setLastname($data["lastname"]);
				$user->setEmail($data["email"]);
				$user->setPwd($data["pwd"]);
				$user->save();
			}
		}
	}

	public function loginAction(){
	
		$v = new View("loginUser", "front");
		
	}

	public function forgetPasswordAction(){

		$v = new View("forgetPasswordUser", "front");
		
	}

}
