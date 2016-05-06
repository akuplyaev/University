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
">Информация о студентах</h2>
<table class="table table-striped"
    <thead>
        <tr>
            <th>Номер зачетки</th>
            <th>ФИО</th>
            <th>Пол</th>
            <th>Год поступления</th>
            <th>Код специальности</th>
            <th>Пароль</th>
            <th>Специальность</th>
            <th>Срок обучения(в семестрах)</th>
            <th>Колличество зачетных часов</th>
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
    $queryString="Select * from stud INNER JOIN prof WHERE stud.kod=prof.kod";
    $result=$db->prepare($queryString);
    $result->execute();
    $row=$result->fetchAll();
        foreach($row as $str){
            echo "<tr>";
            echo "<td>".$str->nz."</td>";
            echo "<td>".$str->fio."</td>";
            echo "<td>".($str->pol==1?'мужской':'женский')."</td>";
            echo "<td>".$str->gp."</td>";
            echo "<td>".$str->kod."</td>";
            echo "<td>".$str->parol."</td>";
            echo "<td>".$str->nazv."</td>";
            echo "<td>".$str->srok."</td>";
            echo "<td>".$str->kolze."</td>";
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
