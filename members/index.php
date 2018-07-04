<?php
    if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["page"])){
        
        switch($_GET["page"]){
            case "Login":
                return readfile(dirname(__FILE__)."/login-page-content.html");
                break;
            case "Register":
                return readfile(dirname(__FILE__)."/register-page-content.html");
                break;
            default:
                echo "No Page was requested";
        }
    }
    else{
        echo "An Error Occured.";
    }
?>
