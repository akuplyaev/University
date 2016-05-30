<?php
class Subjects{
    static public function getSubjects(){
        $db=Db::getConnection();
        $queryString = "Select * from subj WHERE predyd=0";
        $result = $db->prepare($queryString);
        $result->execute();
        $row=$result->fetchAll();
        $db=null;
        return $row;
    }
    public static function  getKursInfo($nz){
        $db=Db::getConnection();
        $queryString="Select * from subj INNER JOIN ssp ON subj.id_subj=ssp.id_subj
                                         INNER JOIN prep ON ssp.id_prep=prep.id_prep
                                         INNER JOIN sssp ON ssp.id_ssp=sssp.id_ssp WHERE sssp.nz=:nz";
        $result = $db->prepare($queryString);
        $result->execute(array(':nz'=>$nz));
        $row=$result->fetchAll();
        $db=null;
        return $row;
    }
}