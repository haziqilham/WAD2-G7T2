<?php 
    class User{
        private $username;
        private $hashedPassword;
        private $name;
        public function __construct($username,$name,$hashedPassword){
            $this->username = $username;
            $this->hashedPassword = $hashedPassword;
            $this->name = $name;
        }
        public function getUsername(){
            return $this->username;
        }
        public function getHashedPassword(){
            return $this->hashedPassword;
        }
        public function getName(){
            return $this->name;
        }
    }
?>