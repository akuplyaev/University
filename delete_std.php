<?php session_start();
require_once 'config/Autoload.php';
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
    $counter=0;
    foreach($_POST as $value){
        Students::deleteStudents($value);
        $counter++;
    }
    echo "<h2 style='text-align: center; margin-top: 10px; margin-bottom: 20px;'>Удалено ".$counter." записей</h2>";

