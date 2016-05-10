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
">Добавление студента</h2>

    <form action="add_std.php" method="post" class="" >
        <div class="input-group">
            <input type="number" placeholder="Номер зачетки" name="nz" required>
        </div><br>
        <div class="input-group">
            <input type="text" placeholder="ФИО" name="fio" required>
        </div><br>
        <div class="input-group">
            <label>Пол:</label><br>
            <select name="pol">
                <option value='1'>Мужской</option>
                <option value='0'>Женский</option>
            </select>
        </div><br>
        <div class="input-group">
            <label>Год поступления:</label><br>
            <select name="gp">
                <?php
                for($date=2011;$date<=2025;$date++){
                echo "<option value=$date>$date</option>";
                };
                ?>
            </select>
        </div><br>
        <div class="input-group">
            <label>Cпециальность:</label><br>
            <select name="kod">
                <?php
                    $row=Speciality::getSpecialityInfo();
                    foreach($row as $str) {
                        echo "<option value=$str->kod>" . $str->nazv . "</option>";
                    }
                    $db=null;
                ?>
            </select>
        </div><br>
        <div class="input-group">
            <input type="text" placeholder="Пароль" name="parol" required>
        </div><br>
        <div class="input-group">
            <input type="submit" value="Добавить">
        </div>
    </form>

