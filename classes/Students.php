<?php
require_once 'Db.php';
    class Students
    {
        public static function getAllStudentsInfo(){
            $db = Db::getConnection();
            $queryString = "Select * from stud INNER JOIN prof WHERE stud.kod=prof.kod GROUP BY stud.nz";
            $result = $db->prepare($queryString);
            $result->execute();
            $row = $result->fetchAll();
            $db=null;
            return $row;
        }
        public static function addStudent($nz, $fio, $pol, $gp, $kod, $password){
        $db = Db::getConnection();
            $query="Select nz from stud WHERE nz= :nz";
            $query_result=$db->prepare($query);
            $query_result->bindParam(':nz',$nz);
            $query_result->execute();
            if ($query_result->fetch()==false) {
                $queryString = "Insert into stud (nz, fio, pol, gp, kod, parol)
                                  values (:nz, :fio, :pol, :gp, :kod, :parol)";
                $result = $db->prepare($queryString);
                $result->execute(array(':nz'=> $nz,
                    ':fio'=>$fio,
                    ':pol'=>$pol,
                    ':gp'=>$gp,
                    ':parol'=>$password,
                    ':kod'=>$kod
                ));
                $db=null;
                return true;
            }
            else{
                $db=null;
                return false;
            }
        }
        public static function authorization($login,$password){

            $db = Db::getConnection();
            $queryString="Select * from stud WHERE nz= :login";
            $result=$db->prepare($queryString);
            $result->bindParam(':login',$login);
            $result->execute();
            $row=$result->fetch();
            $db=null;
            if($row==false){
               echo 'Неправильный логин или пароль';
                return;
            }
            elseif($row->parol!=$password){
                echo'Неправильный пароль или пароль';
                return;
            }
            else{
                $_SESSION['fio']=$row->fio;
                $_SESSION['login']=$row->nz;
                $_SESSION['avtorizate']=true;
                return;
            }
        }
        public static function getStudentsNotAdmin(){

            $db = Db::getConnection();
            $queryString="Select * from stud WHERE nz!= 0 GROUP by fio";
            $result=$db->prepare($queryString);
            $result->execute();
            $row=$result->fetchAll();
            $db=null;
            return $row;
        }
        public static function deleteStudents($value){
            $db = Db::getConnection();
            $queryString="Delete from stud WHERE nz=:nz";
            $result=$db->prepare($queryString);
            $result->execute(array(':nz'=>$value));
        }
        public static function changePasswordStudents($student,$password){
            $db = Db::getConnection();
            $queryString = "UPDATE stud set parol=:password WHERE nz=:nz";
            $result = $db->prepare($queryString);
            $result->execute(array(
                ':nz'=>$student,
                ':password'=>$password
            ));
            return true;
        }

    }


