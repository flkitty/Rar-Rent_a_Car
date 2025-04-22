<?php
require_once 'UserInterface.php';

// Factory class for creating and deleting users
class UserFactory {
    public static function createUser($data) {
        return new User($data);
    }

    public static function deleteUser($userid) {
        $query = "DELETE FROM users WHERE userid = '$userid'";
        $DB = new Database();
        $DB->save($query);
    }
}

// User class implementing UserInterface
class User implements UserInterface {
    public $userid;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $url_address;

    public function __construct($data) {
        $this->userid = $data['userid'];
        $this->first_name = $data['first_name'];
        $this->last_name = $data['last_name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->url_address = strtolower($this->first_name) . "." . strtolower($this->last_name);
    }

    public function getUserId() {
        return $this->userid;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }
}

// Signup class now uses the factory
class Signup {
    private $error = "";

    public function evaluate($data) {
        foreach ($data as $key => $value) {
            if (empty($value)) { 
                $this->error .= $key . " is empty!<br>";
            }
        }

        if ($this->error == "") {
            // Use factory to create user
            $user = UserFactory::createUser($data);
            $this->saveUser($user);
        } else {
            return $this->error;
        }
    }

    private function saveUser($user) {
        $query = "INSERT INTO users (userid, first_name, last_name, email, password, url_address) 
                  VALUES ('$user->userid', '$user->first_name', '$user->last_name', '$user->email', '$user->password', '$user->url_address')";
        $DB = new Database();
        $DB->save($query);
    }

    public function deleteUser($userid) {
        UserFactory::deleteUser($userid);
    }
}
?>