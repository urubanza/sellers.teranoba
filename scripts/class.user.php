<?php
//user class for auth
class user{
	function login($email, $pwd, $hashed = false){
		//loggin in the user
		global $conn;
		$email = $conn->real_escape_string($email);
		

		if(!$hashed){
			$pwd = md5($pwd);
		}

		$query = $conn->query("SELECT * FROM users WHERE email = \"$email\" AND password = \"$pwd\" AND type = 'admin' ") or die("Logging error $conn->error");
		if($query->num_rows){
			$user_data = $query->fetch_assoc();
			if(!session_id())
				session_start();


			$_SESSION['user'] = $user_data['email'];
			$_SESSION['pwd'] = $user_data['password'];
			$_SESSION['admId'] = $user_data['userId'];
			return $user_data['userId'];
		}else
			return false;
	}

	function isLogged(){
		//Here we check if the current user is logged in
		if(!session_id()){
			session_start();
		}

		//Check if the user key is set
		$email = $_SESSION['user']??"";
		$userpwd = $_SESSION['pwd']??"";

		$user = $this->login($email, $userpwd, true);

		return $user;
	}
	function data($userid){
		//return basic relevant data
		global $conn;

		$sql = "SELECT *, CONCAT(u.fname, ' ', u.lname) as name FROM users as u JOIN shopusers as s ON u.userId = s.userId WHERE u.userId = \"$userid\" LIMIT 1 ";
		$query = $conn->query($sql) or trigger_error("Can't get user data $conn->error");
		// $query = $conn->query("SELECT shopusers.*, shops.id as shopId FROM shopusers JOIN shops ON shopusers.userId = shops.admin WHERE userId = \"$userid\" LIMIT 1 ") or die("Can't get user data $conn->error");

		$userdata = $query->fetch_assoc();

		// $userdata['shops'] = $this->userShops($userid);

		return $userdata;
	}

	function userShops($userid){
		//returns the shops owned by id
		global $conn;

		$query =  $conn->query("SELECT * FROM shops WHERE admin = \"$userid\" ") or die("Can't get user's shops $conn->error");

		$shops = array();
		while ($data = $query->fetch_assoc()) {
			$shops[] = $data;
		}
		return $shops;
	}
}


?>