<?php


# Autoload and start session
spl_autoload_register(
    function($class){
        require_once "model/$class.php";
    }
);
    

function doLogin($email, $password, $results) {    
    # Get parameters passed from login.php
    // $email = $_POST["email"];
    // $password = $_POST["password"];
    
    # Get user information
    $dao = new UserDAO();
    $user = $dao->retrieve($email);

    # Check if user exists 
    $success = false;
    if($user != null){
        # Get stored hashed password
        $hashed = $user->getHashedPassword();
        # Check if entered password matches stored hashed password
        $success = password_verify($password,$hashed); 

        if($success){
            $results["status"] = true;
            $results["email"] = $email ;
            $results["first_name"] = $user->getFirstName();
            $results["last_name"] = $user->getLastName();
        }

        // $result_convert = json_encode( $results, JSON_PRETTY_PRINT );

        return $results;
    }
}

$results = [
    "status" =>  false
];



if ( isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $results = doLogin($email, $pwd, $results);

} else { // axios sends via raw data
    $obj = json_decode( file_get_contents("php://input") );
    $email = $obj->email;
    $pwd = $obj->password;
    $results = doLogin($email, $pwd, $results);
}


echo json_encode( $results, JSON_PRETTY_PRINT );
