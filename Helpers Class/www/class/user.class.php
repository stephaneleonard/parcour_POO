<?php

require_once('database.class.php');
require_once('validator.class.php');

class User extends Database
{
    private int $id;
    private string $username;
    private string $email;
    private string $password;
    private bool $connected;

    public function __construct($username, $email, $password)
    {
        if (!$this->validateInput($username, $email, $password)) {
            throw new UnexpectedValueException('error wrong value inserted');
        }
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->connected = 0;

        //create user in db
        $this->addUserToDb();
        //get id from db
        $this->id = $this->getIdFromDatabase();
    }

    private function addUserToDb()
    {

        $db = parent::dbConnect();
        $sql = "INSERT INTO `user`(`username`, `email`, `password`, `connected`) VALUES (? ,? ,? ,? )";
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([$this->username, $this->email, $this->password, !$this->connected ? 0 : 1]);
        if (!$res) {
            throw new UnexpectedValueException('error in inserting in database');
        }
    }

    private function validateInput($username, $email, $password)
    {
        $validator = new Validator();
        $v1 = $validator->string($username);
        var_dump($v1);
        $v2 = $validator->email($email);
        var_dump($v2);
        $v3 = $validator->string($password);
        var_dump($v3);
        return $v1 && $v2 && $v3;
    }

    private function getIdFromDatabase()
    {
        $db = parent::dbConnect();
        $sql = "SELECT id FROM user WHERE username = '$this->username'";
        var_dump($sql);
        $res = $db->query($sql)->fetch();
        if (!$res) {
            throw new UnexpectedValueException('error in getting from');
        }
        return (int) $res['id'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getConnect(){
        return $this->connected;
    }

    private function setProperty($property, $value)
    {
        $db = parent::dbConnect();
        $sql = "UPDATE `user` SET $property= ? WHERE id = $this->id";
        $stmt = $db->prepare($sql);
        $res = $stmt->execute([$value]);
        if (!$res) {
            throw new UnexpectedValueException('error in updating in database');
        }
    }

    public function setUsername($username)
    {
        $this->setProperty('username', $username);
        $this->username = $username;
    }

    public function setEmail($email)
    {
        $this->setProperty('email', $email);
        $this->email = $email;
    }

    private function setConnected($value)
    {
        $this->setProperty('connected', $value);
        $this->connected = $value;
    }

    public function connect()
    {
        $this->setConnected(1);
        $_SESSION["id"] = $this->id;
    }

    public function disconnect()
    {
        $this->setConnected(0);
        $_SESSION["id"] = null;
    }

    public function deleteFromDb()
    {
        $db = parent::dbConnect();
        $sql = "DELETE FROM `user` WHERE id = $this->id";
        $stmt = $db->prepare($sql);
        $res = $stmt->execute();
        if (!$res) {
            throw new UnexpectedValueException('error in updating in database');
        }
    }
}
