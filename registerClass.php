<?php 

class RegisterUser
{
    private $username;
    private $fullname;
    private $raw_password;
    private $encrypted_password;
    private $date;
    private $sex;
    public $error;
    public $success;
    
    private $storage = "Credentials.json";

    private $stored_users;

    private $new_user;


    public function __construct($username, $password, $date, $sex, $fullname){

        $this->username = trim($username);
        $this->username = filter_var($this->username, FILTER_SANITIZE_STRING);
    
        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
        $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);
    
        $this->stored_users = json_decode(file_get_contents($this->storage), true);


        $this->date = $date; 
        $this->sex = $sex; 
        $this->fullname = $fullname;
    
        $this->new_user = [
            "username" => $this->username,
            "password" => $this->encrypted_password,
            "gender"   => $this -> sex, 
            "dateOfBirth" => $this -> date, 
            "fullname" => $this -> fullname, 
        ];
        
    
        if ($this->checkFieldValues()) {
            $this->insertUser();
        }
    }
    
    private function checkFieldValues() {
        if (empty($this->username) || empty($this->raw_password)) {
            $this->error = "Both fields are required";
            return false;
        } else {
            return true;
        }
    }
    
    private function usernameExists() {
        foreach ($this->stored_users as $user) {
            if ($this->username == $user['username']) {
                $this->error = "Username taken, please choose a different one.";
                return true;
            }
        }
        
        return false;
    }
    
    private function insertUser() {
        if ($this->usernameExists() == false) {
            array_push($this->stored_users, $this->new_user);
            if (file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT)) !== false) {
                header("Location: home.php");
                exit;
            } else {
                $this->error = " wrong!, please try again";
            }
        }
    }
    
}
