<?php
require_once 'classes/Autoload.php';
if(empty($_POST['firstname']) || empty($_POST['name']))
{
    return false;
}
$firstname=trim($_POST['firstname']);
$name=trim($_POST['name']);
$fio=$firstname." ".$name;
    $row=Professors::SearchProfessor($fio);
    if ($row!=false) {
        foreach($row as $str) {
            echo  $str->fio ;
            echo "<br>".$str->stepen;
        }
    }
    else{
        echo "Преподаватель не найден";
        exit();
    }

