<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="style.css">
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
      //$statement = $pdo->query('SELECT * FROM patients WHERE name = :name'); а не так? А если так то почему?
      $stmt = $pdo->prepare('SELECT * FROM patients WHERE id = :id');
      $stmt->bindParam(':id', $_GET['id'],  PDO::PARAM_INT);
      $stmt->execute();
    }
    catch(PDOException $e) 
    {echo 'ERROR: ' . $e->getMessage();}

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

     $id = $fields['id'];
     $name = $fields['name'];
     $curd_num = $fields['card_num'];
     $history = $fields['history'];
     $insurance_num= $fields['insurance_num'];
     $native_city_id = $fields['native_city_id'];
     $sex = $fields['sex'];
     $photo = $fields['photo'];
     $email = $fields['email'];
      
    // echo "<pre>";
    // print_r($fields);
    // echo "</pre>";
    
    //вывод кратких данных о пациенте
    echo "<div class=\"patient margin-c position-rel\">
            <div class='image f-left'><img src =\"".$photo."\"></div>

            <div class=\"dannye f-left\">
              <h3><span>Имя: </span>".$name."</h3>
              <p><span>Номер страховки: </span>".$curd_num."</p>
              <p><span>Секс: </span>".$sex."</p>
              <p><span>Мейл: </span>".$email."</p>
              <p><span>Родной город: </span>".$native_city_id."</p>
              <p><span>История болезни: </span>".$history."</p>
              <a href=\" /edit.php \">Вернуться обатно</a>
            </div>

            <div class=\" edit position-abs none \"></div>
            <div class=\" remove position-abs none \"></div>
            <div class=\"clear\"></div>
          </div>";
    }
    //echo htmlentities($row['name']);
;?>

</body>
</html>