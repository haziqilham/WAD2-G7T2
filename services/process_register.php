<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
    );

    function doRegister($email, $first_name, $last_name, $password, $results) {    

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $process_first_name = ucwords(strtolower($first_name));
        $process_last_name = ucwords(strtolower($last_name));


        $dao = new UserDAO();
        $status = $dao->add($email, $process_first_name, $process_last_name, $hashed);
        if($status){
            $results['status'] = true;
            $results['first_name'] = $process_first_name;
            $results['last_name'] = $process_last_name;
            $results["email"] = $email ;

        }
        else{
            echo "Failed to register";
        }

        return $results;
    }

    $results = [
        "status" =>  false
    ];


    if ( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['last_name']) && $_POST['password'] === $_POST['confirm_password']) {
        var_dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $results = doRegister($email, $first_name ,$last_name, $password,$results);
    
    } else { // axios sends via raw data
        $obj = json_decode( file_get_contents("php://input") );
        $email = $obj->email;
        $password = $obj->password;
        $first_name = $obj->first_name;
        $last_name = $obj->last_name;
        $results = doRegister($email, $first_name ,$last_name, $password,$results);
    }
    
    
    echo json_encode( $results, JSON_PRETTY_PRINT );
    


?>