<?php session_start();
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
?>
<h2 style="
    text-align: center;
    margin-top: 10px;
    margin-bottom: 20px;
">Удаление студентов</h2>
<form id="delete_students_form">
<table class="table table-bordered table-condensed"
<thead>
<tr>
    <th>ФИО</th>
    <th>Удаление</th>
</tr>
</thead>
<thbody>
    <?php
    try {
        $db=new PDO("mysql:dbname=diplom;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE=>TRUE
        ));
        $db->exec('SET NAMES utf8');
        $queryString="Select nz,fio from stud WHERE nz!=0 GROUP by fio";
        $result=$db->prepare($queryString);
        $result->execute();
        $row=$result->fetchAll();
        foreach($row as $str){
            echo "<tr>";
            echo "<td>".$str->fio."</td>";
            echo "<td><input type='checkbox' name='chk$str->nz' value='$str->nz'></td>";
            echo "</tr>";
        }
    }
    catch (PDOExepction $e){
        echo('Ошибка: ' . $e->getMessage());
    }
    $db=null;
    ?>
</thbody>
</table>
    <script src="/js/delete_students_ajax.js"></script>
    <button class="btn btn-primary" id="delete_students_btn">Удалить отмеченные</button>
</form>
