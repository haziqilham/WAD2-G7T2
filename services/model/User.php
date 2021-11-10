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
    }
?>