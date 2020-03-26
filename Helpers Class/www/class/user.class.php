<?php

require_once('database.class.php');

class User extends Database
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private bool $connected;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

        //create user in db
        $this->addUserToDb();

    }

    private function addUserToDb(){
        
        $db = parent::dbConnect();
        $sql = "INSERT INTO `user`(`username`, `email`, `password`, `connected`) VALUES (? ,? ,? ,? )";
        $stmt = $db->prepare($sql);
        // $stmt->execute([$this->username , $this->]);

    }
}
