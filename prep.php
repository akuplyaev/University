<?php require_once  'layouts/header.php'; ?>
	<div class="row search">
          <div class="col-lg-6" id="left"> 
             <form  method="Post" id="searchprepform">
                    <cg><h1 style="color: white;font-size: 40px" class="rt">ПОИСК ПРЕПОДАВАТЕЛЯ</h1>
                    <p style="color: white;margin-bottom:20px;font-size: 20px" class="dr" id="rtt">Введите фамилию и имя преподавателя</p>
                    <input type="text" size="35" name="firstname"  id="fname" placeholder="Фамилия" required></input>
                    <br></br>
                    <input type="text" size="35" name="name" id="mname" placeholder="Имя" required></input>
                    <br></br>
                    <button class="btn" type="submit" id="search-prep">НАЙТИ</button></cg>
                </form>
          </div>
          <div class="col-lg-6" id="right">
              <h1 style="color: white;font-size: 40px" id="ressearch"></h1>
          </div>
     </div>
<form action="searchprep.php" method="POST"><input type="submit"></form>
     <!-- Carousel
    ================================================== -->
    <div  id="carousel" class="carousel" data-ride="carousel">
    
    <div class="carousel carousel-inner">
<?php
require_once 'config/Autoload.php';
$result=Professors::getAllProfessorsInfo();
$counter=1;
foreach ($result as $row)
{
    ?>
   <div class="item <?php if($counter <= 1){echo " active"; } ?>">
     <div class="row">
        <div class="col-lg-6 leftcol"  >
            <img src="/img/<?php echo $row[photo] ?>" alt=''>
            </div>
            <div class="col-lg-6 rightcol rightr"  >
                <cg><h3><?php echo $row[fio] ?></h3>
                <p><?php  echo "Должность: ". $row['dolzhn'] ?></p>
                <p><?php  echo "Степень: ". $row['stepen'] ?></p>
                <p><?php  echo "Звание: ". $zv=($row['zvanie']!="")?$row['zvanie']:"Нет" ?></p>
                <p><?php  echo "Образование: ". $row['obr'] ?></p>
                <p><?php  echo "Дисциплины: ". $row['GROUP_CONCAT(subj.nazv)'] ?></p></cg>
            </div>
        </div>
        </div>
  <?php  $counter++; 
}
$db=null;
?>  
  
<a href="#carousel" class="left carousel-control" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a href="#carousel" class="right carousel-control" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div>
    </div>
    <!-- /.carousel -->
    
<?php require_once  'layouts/footer.php'; ?>