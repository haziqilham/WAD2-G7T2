<?php
    # Autoload and start session
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
    );
    session_start();

    # Get parameters passed from login.php
    // $username = $_POST["username"];
    // $password = $_POST["password"];

    # Get user information
    $dao = new UserDAO();
    $user = $dao->retrieve('test@test.com');
    var_dump($user);
