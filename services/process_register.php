<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
    );

    function doRegister($email, $id_name, $password, $results) {    

        $hashed = password_hash($password, PASSWORD_DEFAULT);


        $dao = new UserDAO();
        $status = $dao->add($email, $id_name, $hashed);
        if($status){
            $results['status'] = true;
            $results['id_name'] = $id_name;
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


    if ( isset($_POST['email']) && isset($_POST['password']) && isset($_POST['id_name'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id_name = $_POST['id_name'];
        $results = doRegister($email, $id_name, $password,$results);
    
    } else { // axios sends via raw data
        $obj = json_decode( file_get_contents("php://input") );
        $email = $obj->email;
        $password = $obj->password;
        $id_name = $obj->id_name;
        $results = doRegister($email, $id_name, $password,$results);
    }
    
    
    echo json_encode( $results, JSON_PRETTY_PRINT );
    


?>