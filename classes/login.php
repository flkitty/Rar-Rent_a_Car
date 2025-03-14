<?php

class Login {
    private $error = [];

    function evaluate($data) {
        $email = addslashes($data['email']);
        $password = $data['password']; // Do not hash it here

        $DB = new Database();
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $result = $DB->read($query);

        if ($result) {
            $row = $result[0];

            // Use password_verify to check hashed password
            if (password_verify($password, $row['password'])) {
                $_SESSION['Rar_userid'] = $row['userid'];
                $_SESSION['Rar_username'] = $row['first_name'];
                return true;
            } else {
                $this->error[] = "Incorrect email or password.";
                return $this->error;
            }
        } else {
            $this->error[] = "User not found.";
            return $this->error;
        }
    }
}
?>
