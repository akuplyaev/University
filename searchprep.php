<?php
if(empty($_POST['firstname']) || empty($_POST['name']))
{
    return false;
}
$firstname=trim($_POST['firstname']);
$name=trim($_POST['name']);
$fio=$firstname." ".$name;
try {
    $db = new PDO("mysql:dbname=diplom;host=localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => TRUE
    ));
    $db->exec('SET NAMES utf8');
    $queryString="Select * from prep WHERE fio LIKE ?";
    $result = $db->prepare($queryString);
    $result->execute(array($fio."%"));
    $row=$result->fetchAll();
    if (!empty($row)) {
        foreach($row as $str) {
            echo  $str->fio ;
            echo "<br>".$str->stepen;
        }
    }
    else{
        echo "Преподаватель не найден";
        exit();
    }

}
catch (PDOException $e) {
    echo('Ошибка: ' . $e->getMessage());

}
$db=null;