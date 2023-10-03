<?php 
    class User {
        private int $uuid;
        private string $username;
        private string $password;
        private bool $agreed;

        public function __construct($uuid, $username, $password,$agreed){
            $this->uuid = $uuid;
            $this->username = $username;
            $this->password = $password;
            $this->agreed = $agreed;
        }

        public function getUuid(){
            return $this->uuid;
        }

        public function getUsername(){
            return $this->username;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getAgreed(){
            return $this->agreed;
        }

        public function setUsername($username){
            $this->username = $username;
        }
        public function setPassword($password){
            $this->password = $password;
        }
    }
?>