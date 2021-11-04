<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
    );

    # Start session
    session_start();

    # Get parameters passed from register.php
    $email = $_POST["email"];
    $id_name = $_POST["id_name"];
    $password = $_POST["password"];

    # Hash entered password
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    # Add new user
    $dao = new UserDAO();
    $status = $dao->add($email, $id_name, $hashed);
    if($status){
        # Delete the following line
        $_SESSION['success'] = "Registered Successfully.";
        # Put "Registered successfully"
        # in a session variable "success"
        
        # Redirect to login.php
        # Provide information of the newly registered user 
        # at the back of the URL


        ## NEED TO CHANGE HEADER HERE
        header("Location:login.php?username=$username");
        exit;
        
    }
    else{
        echo "Failed to register";
    }
?>