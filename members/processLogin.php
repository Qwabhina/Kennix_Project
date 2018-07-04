<?php
    //Libraries File
    require_once($_SERVER["DOCUMENT_ROOT"]."/page-includes/libraries/functions.php");

	//Start a secure Session
	secure_session();
	
	//Check Form Submission
	if(isset($_POST['btn_login'])){
        
		//Sanitize and Encrypt User Input
		$f = sanitize_input($_POST['username'], "string");
        //$f = hash('ripemd160', $f);
		
		//Submit Query
		$stepOne = find_username($f);
        
		//Verify Query State
		if($stepOne === "Success"){
            
			//Get data stored in $_SESSION
			$name = $_SESSION['full-name'];
			$password = $_SESSION['sess-password'];
			
            //Sanitize all data
			$n = sanitize_input($name, "string");
			$p = sanitize_input($password, "string");
			$ft = sanitize_input($_POST['password'], "string");
		
            //Compare password and process login on success
            sign_user_in($ft, $n, $p);
		}
		else{
			exit($stepOne);
		}
	}
    else{
        exit("You can't view this page!");
    }
?>