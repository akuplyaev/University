<?php
class Professors
{
    static function getAllProfessorsInfo()
    {
        $db = Db::getConnection();
        $query = "select prep.fio,prep.dolzhn,prep.stepen,prep.zvanie,prep.obr,prep.photo,subj.nazv,
             GROUP_CONCAT(subj.nazv)
             FROM
             prep
             INNER JOIN
             ssp
             ON prep.id_prep = ssp.id_prep
             LEFT JOIN subj
             ON ssp.id_subj = subj.id_subj
             GROUP BY prep.fio";
        $result = $db->prepare($query);
        $result->execute();
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        $db = null;
        return $row;
    }

    static function SearchProfessor($fio)
    {
        $db = Db::getConnection();
        $queryString = "Select * from prep WHERE fio LIKE ?";
        $result = $db->prepare($queryString);
        $result->execute(array($fio . "%"));
        $row = $result->fetchAll();
        $db = null;
        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }

    static function getProfessor($id_subj)
    {
        $db = Db::getConnection();
        $queryString = "Select * FROM prep  INNER JOIN
                        ssp
                        ON prep.id_prep = ssp.id_prep
                        LEFT JOIN subj
                        ON ssp.id_subj = subj.id_subj WHERE subj.id_subj=:id
                        GROUP BY prep.fio;";
        $result = $db->prepare($queryString);
        $result->execute(array(':id' => $id_subj));
        $row = $result->fetchAll();
        $db = null;
        return $row;
    }
}