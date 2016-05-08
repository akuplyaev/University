<?php session_start();
require_once 'classes/Students.php';
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
?>
<h2 style="
    text-align: center;
    margin-top: 10px;
    margin-bottom: 20px;
">Изменение пароля</h2>
<form id="frm_chg_psw">
    <div class="input-group">
        <label>Выбрать студента:</label><br>
        <select name="kod">
            <?php
                $row=Students::getStudentsNotAdmin();
                foreach($row as $str) {
                    echo "<option value=$str->nz>" . $str->fio . "</option>";
                }
            ?>
        </select>
    </div><br>
    <div class="input-group">
        <input type="text" placeholder="Пароль" name="password" id="psw_chg_input" required>
    </div><br>
    <div class="input-group">
        <script src="/js/change_password_ajax.js"></script>
        <button  id="change_psw">Изменить</button>
    </div>
</form>
