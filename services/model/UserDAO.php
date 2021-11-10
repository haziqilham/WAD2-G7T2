<?php
    class UserDAO{

        # Add a new user to the database
        public function add($email,$first_name, $last_name, $hashed_password){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "insert into user (email, first_name, last_name, hashed_password) 
                    values (:email, :first_name, :last_name, :hashed_password)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":first_name",$first_name);
            $stmt->bindParam(":last_name",$last_name);
            $stmt->bindParam(":hashed_password",$hashed_password);
            $status = $stmt->execute();
            

            $stmt = null;
            $pdo = null;
            return $status;
        }

        # Retrieve a user with a given username
        # Return null if no such user exists
        public function retrieve($email){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "select * from user where email=:email";
            $stmt = $pdo->prepare($sql);
            // $stmt->bindParam(":name",$name,PDO::PARAM_STR);
            $stmt->bindParam(":email",$email,PDO::PARAM_STR);
            $stmt->execute();
            
            $user = null;
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            if($row = $stmt->fetch()){
                $user = new User($row["email"],$row['first_name'],$row['last_name'],$row["hashed_password"]);
            }
            
            $stmt = null;
            $pdo = null;
            return $user;
        }
    }
?>