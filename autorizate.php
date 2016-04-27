<?php
session_start();
if(isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 

    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
try {
$db=new PDO("mysql:dbname=diplom;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
PDO::ATTR_ERRMODE=>TRUE      
));
    $db->exec('SET NAMES utf8');
    $queryString="Select * from stud WHERE nz=".$login; 
    $string=new PDO($queryString);
    $string=$string->quote($queryString);  
    $reuslt=$db->query($string);
    $row=$reuslt->fetch();  
    print_r($row); 
    

}
 catch (PDOExepction $e){
     die('Подключение не удалось: ' . $e->getMessage());
};
