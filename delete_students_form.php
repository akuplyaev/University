<?php session_start();
require_once 'classes/Autoload.php';
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
        $row=Students::getStudentsNotAdmin();
        foreach($row as $str){
            echo "<tr>";
            echo "<td>".$str->fio."</td>";
            echo "<td><input type='checkbox' name='chk$str->nz' value='$str->nz'></td>";
            echo "</tr>";
        }

    ?>
</thbody>
</table>
    <script src="/js/delete_students_ajax.js"></script>
    <button class="btn btn-primary" id="delete_students_btn">Удалить отмеченные</button>
</form>
