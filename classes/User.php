<?php
class User{
    public $login;
    private $password;
    function __construct($login,$password){
        $this->login=$login;
        $this->password=$password;
    }
    public function Authorization(){
        $db = Db::getConnection();
        $queryString="Select * from stud WHERE nz= :login";
        $result=$db->prepare($queryString);
        $result->bindParam(':login',$this->login);
        $result->execute();
        $row=$result->fetch();
        $db=null;       
        if($row==false || password_verify($this->password,$row->parol)){
            return false;
        }
        else{
            return true;
        }
    }
    public function getFio(){
        $db = Db::getConnection();
        $queryString="Select fio from stud WHERE nz= :login";
        $result=$db->prepare($queryString);
        $result->bindParam(':login',$this->login);
        $result->execute();
        $row=$result->fetch();
        return $row->fio;
    }

}