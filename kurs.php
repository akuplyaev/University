<?php require_once  'layouts/header.php'; ?>
    <div class="container maps" xmlns="http://www.w3.org/1999/html">
        <h1>Список предметов для выбора</h1>
       <form action="select.php" method="post">
           <div class="row">
               <div class="col-lg-3">
           <select class="form-control input-sm">
           <?
           require_once 'classes/Subjects.php';
               $row=Subjects::getSubjects();
               foreach($row as $str) {
                   echo '<option>' . $str->nazv . '</option>';
                }
               ?>
           </select>
                   <br>
               </div>
           </div>
           <button type="submit" class="btn btn-primary">
               Выбрать
           </button>
       </form>
    </div>
<?php require_once  'layouts/footer.php'; ?>