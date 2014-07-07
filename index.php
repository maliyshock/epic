<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
  $( document ).ready(function() 
    {
      $(".big_btn").click( function(){
      $(this).next().slideToggle(300);
    }); 

    $(".remove").click( function()
    {
      var id = $(this).attr('title');
      $.post( "delete.php", {id: id} ).done(function() {
    alert( "в морг его!" );
  });
    }); 
});
</script>
  <title>Scrubs</title>
</head>


<body>
<?php 
  try
    {
      //$name = $_GET['name'];
      $pdo = new PDO('mysql:host=localhost;dbname=scrubs', 'root', '');
      $pdo->setAttribute(
      PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION
      );

      //$statement = $pdo->query('SELECT * FROM patients WHERE name ='. $pdo->quote($name)); почему обращаемся к переменной именно так
      //$statement = $pdo->query('SELECT * FROM patients WHERE name ='. :name); а не так?
      $stmt = $pdo->prepare('SELECT id, name, photo, email, sex FROM patients');
      //$stmt->bindParam(':name',  PDO::PARAM_INT);
      $stmt->execute();
    }
    catch(PDOException $e) 
    {echo 'ERROR: ' . $e->getMessage();}

// форма добавить пациента
  echo  "<div class='add_wrapper margin-c'>
          <div class='big_btn margin-c'>+</div>
          <div class='form none margin-c'>
            <form action='' method='post'>
              <input type='text' placeholder='Имя' name='name'><br/>
              <input type='email' placeholder='email' name='email'><br/>
              <input type='text' placeholder='sex' name='sex'><br/>
              <input type='text' placeholder='родной город' name='native_city_id'><br/>
              <input type='number' placeholder='номер страхования' name='insurance_num'><br/>
              <input type='number' placeholder='номер карты пациента' name='card_num'><br/>
              <textarea cols='30' rows='5' placeholder='история болезни' name='history'></textarea><br/>
              <input type='file' value='загрузить фото' name='photo'><br/>
              <input type='submit' name='submit' value='Отправить'>
            </form>
            <div class='clear'></div>
          </div>
          </div>";

// добавление поциента
          if (isset($_POST['submit']))
          {
            $add = $pdo->prepare('INSERT INTO patients (name, email, sex, insurance_num, card_num, history ) VALUES(:name, :email, :sex, :insurance_num, :card_num, :history )');
            $add->execute(array(':name' => $_POST['name'],
              ':email' => $_POST['email'],
              ':sex' => $_POST['sex'],
              ':insurance_num' => $_POST['insurance_num'],
              ':card_num' => $_POST['card_num'],
              ':history' => $_POST['history']
            ));
          }

// вывод кратких записей пациентов логика
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
    //echo "<pre>";
    //print_r($row);
    //echo "</pre>";
   foreach ($row as $key => $value) 
      {
        // проверка на пустоту полей
        $fields[$key] = $value;

        if (empty($fields[$key]))
          {
             if ($key == 'photo') 
              {$fields[$key] = "images/no-photo.jpg";}
            
            else{$fields[$key] = "данные не указаны";}
          }
      }

    //вывод кратких данных о пациенте вид
    echo "<div class=\"patient margin-c position-rel\">
            <div class='image f-left'><img src =\"".$fields['photo']."\"></div>

            <div class=\"dannye f-left\">
              <h3><span>Имя: </span>".$fields['name']."</h3>
              <p><span>Секс: </span>".$fields['sex']."</p>
              <p><span>Мейл: </span>".$fields['email']."</p>
              <a href=\" patient.php?id=".$fields['id']." \">Посмотреть анкету пациента</a>
            </div>

            <div class=\" edit position-abs none \"></div>
            <div title=".$fields['id']." class=\" remove position-abs none \"></div>
            <div class=\"clear\"></div>
          </div>";
    }
;?>

</body>
</html>