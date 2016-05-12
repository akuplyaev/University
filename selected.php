<?php
require_once 'config/Autoload.php';
$id_subj=$_POST['id'];

$row=Professors::getProfessor($id_subj);
echo "<select class='form-control input-sm'>";
foreach($row as $str) {
    echo "<option value='$str->id_prep'>". $str->fio . '</option>';
}
echo "</select>";