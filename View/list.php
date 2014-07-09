<div id='spisok' class='patient margin-c position-rel'>
  <div class='image f-left'><img src ="<?php if (isset($row['photo'])) { echo $row['photo'];} else {echo 'images/no-photo.jpg';} ?>"></div>

  <div class='dannye f-left'>
   <?php if (isset($row['name'])) { echo  "<h3><span>Имя: </span>".$row['name']."</h3>";} ?>
   <?php if (isset($row['card_num'])) { echo  "<p><span>Номер страховки: </span>". $row['card_num']."</p>";} ?>
   <?php if (isset($row['sex'])) { echo  "<p><span>Секс: </span>".$row['sex']."</p>";} ?>
   <?php if (isset($row['email'])) { echo  "<p><span>Мейл: </span>".$row['email']."</p>";} ?>
   <?php if (isset($row['native_city_id'])) { echo "<p><span>Родной город: </span>".$row['native_city_id']."</p>";} ?>
   <?php if (isset($row['native_city_id'])) { echo  "<p><span>История болезни: </span>".$row['history']."</p>";} ?>
    
    <?php  $url = parse_url($_SERVER['REQUEST_URI']) ;

    if ( $url['path'] == '/epic/index.php')
    {
      echo "<a href=' patient.php?id=".$row['id']." '>Посмотреть анкету пациента</a>";
    }

    else {echo  "<a href=\" index.php \"> ← Вернуться обатно</a>" ;}
    ?>           
  </div>

  <div class=' edit position-abs none '></div>
  <div title="<?php echo $row['id'] ;?>" class=' remove position-abs none '></div>
  <div class='clear'></div>
</div>

