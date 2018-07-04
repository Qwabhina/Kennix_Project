<?php
    //Libraries File
    require_once($_SERVER["DOCUMENT_ROOT"]."/page-includes/libraries/functions.php");

	//Start a secure Session
	secure_session();
	
	//Check Form Submission
	if(isset($_POST['btn_register'])){
        //This part performs the server-side validation of the form
        $required_fields = array('first-name', 'other_names', 'gender', 'username', 'password', 'user-email', 'phone-number');
        //Check for Empty Fields
        foreach($_POST as $form => $key){
            if(in_array($key, $required_fields) && empty($key)){
                exit(
                    json_encode(
                        array(
                            "type" => "error",
                            "message" => "One or more fields have been left empty. Please fill all fields.<br>".$key
                        )
                    )
                );
            }
        }
        //Compare Password Fields
        if($_POST['password'] != $_POST['confirm-password']){
            exit(
                json_encode(
                    array(
                        "type" => "error",
                        "message" => "Your passwords do not match."
                    )
                )
            );
        }
        
        
        //Retrieve and Sanitize User Input
        $first_name = sanitize_input($_POST['first-name'], "string");
        $other_names = sanitize_input($_POST['other-names'], "string");
        $member_id = sanitize_input($_POST['member-id'], "string");
        $gender = sanitize_input($_POST['gender'], "string");
        $username = sanitize_input($_POST['username'], "string");
        $password = sanitize_input($_POST['password'], "string");
        $user_email = sanitize_input($_POST['user-email'], "email");
        $phone_number = sanitize_input($_POST['phone-number'], "number");
        
        //Perform the Registration
        register_member(
            $first_name,
            $other_names,
            $member_id,
            $gender,
            $username,
            $password,
            $user_email,
            $phone_number
        );
        
    }
    else{
        exit("You can't view this page now.");
    }
?>