<?php
class Speciality{
    public static function getSpecialityInfo(){
        $db=Db::getConnection();
        $queryString="Select * from prof";
        $res=$db->prepare($queryString);
        $res->execute();
        $row=$res->fetchAll();
        $db=null;
        return $row;
    }
}