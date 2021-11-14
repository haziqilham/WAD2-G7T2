<?php
    # Autoload
    spl_autoload_register(
        function($class){
            require_once "model/$class.php";
        }
    );

    function doPasswordUpdate($email, $old_pwd, $new_pwd, $results) {    
        $dao = new UserDAO();
        $user = $dao->retrieve($email);

        $hashed = $user->getHashedPassword();
        $success = password_verify($old_pwd,$hashed); 
        if ($success){
            $hashed_new = password_hash($new_pwd, PASSWORD_DEFAULT);
            $status = $user->update_password($email, $hashed_new);
            if($status){
                $results['status'] = true;
                $results["email"] = $email ;
                $results['message'] = "Password Changed Successfully";
            }
            else{
                echo $hashed_new;
                echo "Failed to Update";
            }
            return $results;
        }

    }

    $results = [
        "status" =>  false
    ];
    if ( isset($_POST['old_pwd']) && isset($_POST['new_pwd']) && isset($_POST['confirm_pwd']) && $_POST['new_pwd'] == $_POST['confirm_pwd']) {
        var_dump($_POST);
        $email = $_POST['email'];
        $old_pwd = $_POST['old_pwd'];
        $new_pwd = $_POST['new_pwd'];
        $results = doPasswordUpdate($email, $old_pwd ,$new_pwd, $results);
    
    } else { // axios sends via raw data
        $obj = json_decode( file_get_contents("php://input") );
        $email = $obj->email;
        $old_pwd = $obj->old_pwd;
        $new_pwd = $obj->new_pwd;
        $results = doPasswordUpdate($email, $old_pwd ,$new_pwd, $results);
    }
    
    
    echo json_encode( $results, JSON_PRETTY_PRINT );
    


?>