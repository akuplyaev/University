<?php session_start();
require_once 'config/Autoload.php';
if(isset($_POST['id_subject'])) { $id_subject = $_POST['id_subject']; if ($id_subject == '') { unset($id_subject);} }
if (isset($_POST['id_prep'])) { $id_prep=$_POST['id_prep']; if ($id_prep =='') { unset($id_prep);} }

if (Professors::addSssp($id_prep,$id_subject,$_SESSION['login'])){

    header("Location:students.php");
}
else{
    echo "Вы превысили количество часов";

}