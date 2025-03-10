<?php

class Signup{

    private $error = "";
    public function evaluate($data){
        foreach ($data as $key => $value){
            if(empty($value)){
                $this->error = $this->error . $key . " is empty!<br>";
            }
        }
        if ($error == ""){
            //no error
            $this->create_user($data);
        }
        else{
            return $error;
        }

    }

    public function create_user($data){
        $firstname = $data['first_name'];
        $lastname = $data['last_name'];
        $email = $data['email'];
        $password = $data['password'];

        $url_address = strtolower($firstname) . "." . strtolower($lastname); 
        $userid = $data['userid'];

        $query = "insert into users (userid, first_name, last_name, email, password, url_address) values ('$userid', '$first_name', '$last_name', '$email', '$password', '$url_address')";
        $DB = new Database();
        $DB->save($query);

    }
    private function create_userid(){
        $length = rand(4,19);
        $number = "";
        for($i=0; $i<$length; $i++){
            $new_rand = rand(0,9);
            $number = $number . $new_rand;
        }
        return $number;
    }
}