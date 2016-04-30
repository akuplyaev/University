<?php require_once  'layouts/header.php'; ?>
	<div class="row search">
          <div class="col-lg-6" id="left"> 
             <form action="#" method="Post">
                    <cg><h1 style="color: white;font-size: 40px" class="rt">ПОИСК ПРЕПОДАВАТЕЛЯ</h1>
                    <p style="color: white;font-size: 20px" class="dr" id="rtt">Введите фамилию и имя преподавателя</p>
                    <input type="text" size="35" name="firstname" placeholder="Фамилия" required></input>
                    <br></br>
                    <input type="text" size="35" name="name" placeholder="Имя" required></input>
                    <br></br>
                    <button class="btn" type="submit">НАЙТИ</button></cg>
                </form>
          </div>
          <div class="col-lg-6" id="right"> 
        
          </div>
     </div>
     <!-- Carousel
    ================================================== -->
    <div  id="carousel" class="carousel" data-ride="carousel">
    
    <div class="carousel carousel-inner">
<?php 
  $db=new PDO("mysql:dbname=diplom;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE=>TRUE      
    ));
$query="select prep.fio,prep.dolzhn,prep.stepen,prep.zvanie,prep.obr,prep.photo,subj.nazv,
    GROUP_CONCAT(subj.nazv)
    
         FROM
  prep
  INNER JOIN 
  ssp
    ON prep.id_prep = ssp.id_prep
  LEFT JOIN subj
    ON ssp.id_subj = subj.id_subj
    GROUP BY prep.fio";
$result=$db->query($query)->fetchAll(PDO::FETCH_ASSOC);
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
                <h3><?php echo $row[fio] ?></h3>
                <p><?php  echo "Должность: ". $row['dolzhn'] ?></p>
                <p><?php  echo "Степень: ". $row['stepen'] ?></p>
                <p><?php  echo "Звание: ". $row['zvanie'] ?></p>
                <p><?php  echo "Образование: ". $row['obr'] ?></p>
                <p><?php  echo "Дисциплины: ". $row['GROUP_CONCAT(subj.nazv)'] ?></p>
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