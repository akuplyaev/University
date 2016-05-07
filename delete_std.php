<?php session_start();
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
try {
    $db=new PDO("mysql:dbname=diplom;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE=>TRUE
    ));
    $db->exec('SET NAMES utf8');
    $counter=0;
    foreach($_POST as $value){
        $queryString="Delete from stud WHERE nz=:nz";
        $result=$db->prepare($queryString);
        $result->execute(array(':nz'=>$value));
        $counter++;
    }
    echo "<h2 style='text-align: center; margin-top: 10px; margin-bottom: 20px;'>Удалено ".$counter." записей</h2>";
}
catch (PDOExepction $e){
    echo('Ошибка: ' . $e->getMessage());
}
$db=null;