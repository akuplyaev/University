<?php
class Subjects{
    static public function getSubjects($nz){
        $db=Db::getConnection();
        $rs=self::getKursInfo($nz);
        foreach ($rs as $tr){
            $v[]=$tr->id_subj;
        }
        $tr=implode($v,',' );
        $qr=" Select * from stud WHERE nz=:nz";
        $result = $db->prepare($qr);
        $result->execute(array(':nz'=>$nz));
        $row=$result->fetch();
        $kod=$row->kod;
        $queryString = "Select * from subj INNER JOIN sp ON subj.id_subj=sp.id_subj WHERE sp.kod=:kod NOT in ($tr)";
        $result = $db->prepare($queryString);
        $result->execute(array(':kod'=>$kod));
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