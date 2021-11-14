<?php 
    class User{
        private $username;
        private $hashedPassword;
        private $first_name;
        private $last_name;
        public function __construct($username,$first_name,$last_name,$hashedPassword){
            $this->username = $username;
            $this->hashedPassword = $hashedPassword;
            $this->first_name = $first_name;
            $this->last_name = $last_name;

        }
        public function getUsername(){
            return $this->username;
        }
        public function getHashedPassword(){
            return $this->hashedPassword;
        }
        public function getFirstName(){
            return $this->first_name;
        }
        public function getLastName(){
            return $this->last_name;
        }
        public function update_profile($email,$first_name, $last_name){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            
            $sql = "UPDATE user SET `first_name` = :first_name , `last_name` = :last_name WHERE `email` = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":first_name",$first_name);
            $stmt->bindParam(":last_name",$last_name);
            $status = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $status;
        }

        public function update_password($email, $new_pwd){
            $conn_manager = new ConnectionManager();
            $pdo = $conn_manager->getConnection();
            $sql = "UPDATE user SET `hashed_password` = :new_pwd WHERE `email` = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":new_pwd",$new_pwd);
            $status = $stmt->execute();            
            $stmt = null;
            $pdo = null;
            return $status;
        }
    }
?>