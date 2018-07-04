<?php
    ini_set('display_errors', 1);

/***********************************************************************/
//  CORE FUNCTIONS
/***********************************************************************/

    //Always use UTC time
	date_default_timezone_set("UTC");

	//The database configuration
    function create_db(){
        return new mysqli("localhost", "root", "@2wentey16", "compssa");
    }

	//Storage for AJAX response
	$_GLOBAL['msg'] = array();

    //Sanitize User Inputs
    function sanitize_input($x, $type){
        switch($type){
            case "url":
                filter_var($x, FILTER_SANITIZE_URL);
                break;
                
            case "email":
                filter_var($x, FILTER_SANITIZE_EMAIL);
                break;
                
            case "number":
                filter_var($x, FILTER_SANITIZE_NUMBER_INT);
                break;
                
            case "decimal":
                filter_var($x, FILTER_SANITIZE_NUMBER_FLOAT);
                break;
            default:
                filter_var($x, FILTER_SANITIZE_STRING);
        }
        
		htmlspecialchars($x);
		strip_tags($x);
		trim($x);
		stripslashes($x);
		
		return $x;
	}

    //Start a Secure Session
	function secure_session(){
		session_start();
		session_regenerate_id();
	}

    //Logout
	function logout($name, $m_id){
        //Get Database Connection Instance
        $db = create_db();
        
		//Resume the secure Session
		secure_session();  
        
        //Update Last Login Details
        create_last_login($m_id, $db);
                
		//Record logout action
		do_log($name, "logged out of the system");
        
		//Destroy Current $_SESSION data
		session_destroy();
        
		header ("Location: /");
	}

    //Keep Record of all major actions in the system
    function do_log($person, $action){
        if (!file_exists(dirname(__FILE__)."/logs/".gmdate("F Y"))) {
            mkdir(dirname(__FILE__)."/logs/".gmdate("F Y"), 0777, true);
        }
        
        $dateFile = gmdate("jS");
		$logTime = gmdate("g:i:s A");
        $filename = dirname(__FILE__)."/logs/".gmdate("F Y")."/". $dateFile.".txt";
		$message = $person." ".$action;
		$content = "[".$logTime."] ".$message."<br>\n";
		
		$handler = fopen($filename, "a");
		fwrite($handler, $content);
		fclose($handler);
    }

    

/***********************************************************************/
//  LOGIN FUNCTIONS
/***********************************************************************/

    //Search for Username from Database
    function find_username($user){
        //Get Database Connection Instance
        $db = create_db();
        //Query String
        $sql = "SELECT `member_id`, `first_name`, `other_names`, `username_hash`, `password` FROM `members` WHERE `username` = ? LIMIT 1";
        
        if($stmt = $db -> prepare($sql)){
            $stmt -> bind_param("s", $user);
            $stmt -> execute();
            $stmt -> store_result();

            if($stmt -> num_rows === 0){
                $msg["type"] = "error";
                $msg["content"] = "We didn't find this Username";

                exit(json_encode($msg));
            }

            $stmt -> bind_result($mem_id, $fName, $oName, $userhash, $password);
            $stmt -> fetch();
	
            $actualName = $fName . " " . $oName;
            $sessName = $actualName;
            
            $user_n = hash('ripemd160', $user);
            
            if(!hash_equals($userhash, $user_n)){
                $msg["type"] = "error";
                $msg["content"] = "We didn't find this Username";

                exit(json_encode($msg));
            }
            
            //Add these to Session
            $_SESSION['mem_id'] = $mem_id;
            $_SESSION['user-name'] = $user;
            $_SESSION['full-name'] = $sessName;
            $_SESSION['sess-password'] = $password;

            return "Success";
        }
        else{
            $msg["type"] = "error";
            $msg["content"] = "An Error Occured: ".$db -> error;

            exit(json_encode($msg));    
        }
		
        $stmt -> free_result();
		$stmt -> close();
        
		$db -> close();
	}
    
    //Sign users In
    function sign_user_in($passwd, $name, $sess_passwd){
		if(!password_verify($passwd, $sess_passwd)){
            $msg["type"] = "error";
            $msg["content"] = "Password does not match this Username";
            
            do_log($name, "entered a wrong password.");

            exit(json_encode($msg));
        }
		else{
			//Record this action in log file
			do_log($name, "logged in successfully");
            
			//Everythings has checked out so log user in
			//But close db connection before - Security Issues
			//$db -> close();
            $_SESSION['logged_in_status'] = "Logged_In";
			
			$msg["type"] = "success";
			exit(json_encode($msg));
        }
	}

    //Record Last Login information of users
    function create_last_login($mem_id){
        if($stmt = $db -> prepare("SELECT * FROM `last_login` WHERE `member_id` = ? LIMIT 1")){
			$stmt -> bind_param("s", $mem_id);
			$stmt -> execute();
			$stmt -> store_result();
			
			if($stmt -> num_rows === 0){
				$db -> query("INSERT INTO `last_login`(`member_id`, `last_ip`, `last_addr`, `date`) VALUES ('$mem_id', '".$_SERVER['REMOTE_ADDR']."', '', ".time()."')");
            }
            else{
				$db -> query("UPDATE `last_login` SET `date` = '".time()."', '' WHERE `member_id` = '$mem_id'");
            }
			
			$stmt -> free_result();
			$stmt -> close();
        }
    }

    //Validate login status
	function isLoggedIn(){
        $status = isset($_SESSION['logged_in_status']) == "Logged_In" ? true : false;
        
		return $status;
	}



/***********************************************************************/
//  REGISTRATION FUNCTIONS
/***********************************************************************/

    //Generate Member ID
    function create_member_id(){
        $db = create_db();
        
        $numOnRoll = "";
        
        $sql = "SELECT COUNT(*) AS numRoll FROM members";
        $result = $db -> query($sql);
        $row = $result -> fetch_object();
        
        $newNum = $row -> numRoll + 1;
        
        if($newNum <= 9){
            $numOnRoll = "00".$newNum;
        }
        elseif($newNum >= 10 && $newNum < 100){
            $numOnRoll = "0".$newNum;
        }
        else{            
            $numOnRoll = $newNum;
        }
        
		return "COMPSSA-".$numOnRoll;
        $db->close();
	}

    //Register User
    function register_member($first_name, $other_names, $member_id, $gender, $username, $password, $user_email, $phone_number){        
        //Create Database Instance
        $db = create_db();
        
        //Hash the Username and Password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $userhash = hash('ripemd160', $username);
        
        //Change the format of the Phone Number
        $phone_number = ltrim($phone_number, '0');
        $phone_number = "+233".$phone_number;
        
        //The current date as Date Registered
        $date_registered = time();
        
        //Query statement to INSERT data into the database
        $sql = 'INSERT INTO `members`(
                    `member_id`, `first_name`, `other_names`, `gender`, `username`, 
                    `username_hash`, `password`, `user_email`, `phone_number`, `date_registered`
                ) VALUES (
                    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
                )';
        
        //Prepare Statement and perform Registration
        if($stmt = $db -> prepare($sql)){
            $stmt -> bind_param("sssssssssi", $m, $f, $o, $g, $u, $uh, $p, $ul, $pr, $dd);
            
            //Assing the Values to the Various Params
            $f = $first_name;
            $o = $other_names;
            $m = $member_id;
            $g = $gender;
            $u = $username; 
            $uh = $userhash; 
            $p = $password;
            $ul = $user_email; 
            $pr = $phone_number;
            $dd = $date_registered;
            
            //Execute the Prepared Statement
            if(!$stmt -> execute()){ 
                $msg["type"] = "error";
                $msg["content"] = "Could not execute statement: ".$stmt->error;
                
                $stmt->close();
                $db->close();
                
                do_log("Error in SignUp: ", json_encode($msg));
                exit(json_encode($msg));
            }
            else{
                $msg["type"] = "success";
                exit(json_encode($msg));
            }                
        }else{
            $msg['type'] = "error";
            $msg['content'] = "An Error Occurred: ".$db -> error;
            
            exit(json_encode($msg));
        }
    }

//**********  END OF CODE ************//
?>
