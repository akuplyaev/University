<?php
require_once 'Db.php';
class Subjects
{
    static public function getSubjects(){
        $db=Db::getConnection();
        $queryString = "Select * from subj WHERE predyd";
        $result = $db->prepare($queryString);
        $result->execute();
        $row=$result->fetchAll();
        $db=null;
        return $row;
    }
}