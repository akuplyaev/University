<?php session_start();
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
$nz=$_POST['nz'];
$fio=$_POST['fio'];
$pol=$_POST['pol'];
$gp=$_POST['gp'];
$password=$_POST['parol'];
$kod=$_POST['kod'];
try {
    $db=new PDO("mysql:dbname=diplom;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE=>TRUE
    ));
    $db->exec('SET NAMES utf8');
    $query="Select nz from stud WHERE nz= :nz";
    $queryresult=$db->prepare($query);
    $queryresult->bindParam(':nz',$nz);
    $queryresult->execute();
    if ($queryresult->fetch()==false) {
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
        header("Location:admin.php");
    }
    else{
        echo "Такой номер существует";
    }
}
catch (PDOExepction $e){
    echo('Ошибка: ' . $e->getMessage());
}
$db=null;


