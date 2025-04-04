<?php

class Signup {
    private $errors = [];

    public function evaluate($data) {
        foreach ($data as $key => $value) {
            if (empty($value)) { 
                $this->errors[$key] = ucfirst($key) . " is required.";
            }

            if ($key == "email" && !empty($value)) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$key] = "Invalid email format.";
                }
            }

            if (($key == "first_name" || $key == "last_name") && !empty($value)) {
                if (!preg_match("/^[A-Za-z]+$/", $value)) {
                    $this->errors[$key] = ucfirst($key) . " must contain only letters.";
                }
            }

            if ($key == "password" && !empty($value)) {
                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&#]{8,}$/", $value)) {
                    $this->errors[$key] = "Password must have at least 8 characters, 1 uppercase, 1 lowercase, 1 number, and 1 special character.";
                }
            }
        }

        if (empty($this->errors)) {
            return $this->create_user($data);
        } else {
            return $this->errors; // Return an array instead of a single string
        }
    }

    public function create_user($data) {
    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $email = $data['email'];
    $password = password_hash($data['password'], PASSWORD_BCRYPT);
    $userid = $this->create_userid();
    $url_address = strtolower($first_name) . "." . strtolower($last_name);

    $DB = new Database();
    $conn = $DB->connect();

    // **Check if email already exists**
    $check_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return "A user with this email already exists."; // Return error message
    }

    // **Insert user only if email is not found**
    $query = "INSERT INTO users (userid, first_name, last_name, email, password, url_address) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssss", $userid, $first_name, $last_name, $email, $password, $url_address);
    $stmt->execute();

    return "User registered successfully!";
}


    private function create_userid() {
        return rand(1000, 99999999999999999);
    }
}
