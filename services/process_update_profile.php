<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
    );

    function doProfileUpdate($email, $first_name, $last_name, $results) {    
        $process_first_name = ucwords(strtolower($first_name));
        $process_last_name = ucwords(strtolower($last_name));

        $dao = new UserDAO();

        $user = $dao->retrieve($email);
        var_dump($user);
        $status = $user->update_profile($email, $process_first_name, $process_last_name);
        if($status){
            $results['teno'] = $_POST;
            $results['status'] = true;
            $results['first_name'] = $process_first_name;
            $results['last_name'] = $process_last_name;
            $results["email"] = $email ;

        }
        else{
            echo "Failed to Update";
        }

        return $results;
    }

    $results = [
        "status" =>  false
    ];


    if ( isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
        var_dump($_POST);
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $results = doProfileUpdate($email, $first_name ,$last_name, $results);
    
    } else { // axios sends via raw data
        $obj = json_decode( file_get_contents("php://input") );
        $email = $obj->email;
        $first_name = $obj->first_name;
        $last_name = $obj->last_name;
        $results = doProfileUpdate($email, $first_name ,$last_name, $results);
    }
    
    
    echo json_encode( $results, JSON_PRETTY_PRINT );
    


?>