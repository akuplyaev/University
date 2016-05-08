<?php session_start();
require_once 'classes/Students.php';
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
?>
<h2>Информация о студентах</h2>
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
    $row=Students::getAllStudentsInfo();
    foreach ($row as $str) {
        echo "<tr>";
        echo "<td>" . $str->nz . "</td>";
        echo "<td>" . $str->fio . "</td>";
        echo "<td>" . ($str->pol == 1 ? 'мужской' : 'женский') . "</td>";
        echo "<td>" . $str->gp . "</td>";
        echo "<td>" . $str->kod . "</td>";
        echo "<td>" . $str->parol . "</td>";
        echo "<td>" . $str->nazv . "</td>";
        echo "<td>" . $str->srok . "</td>";
        echo "<td>" . $str->kolze . "</td>";
        echo "</tr>";
    }
?>

        </thbody>
</table>
