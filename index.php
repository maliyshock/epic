<?php 
// подключаем голову
require "view/head.php";

//подключаем самописные библиотеки
require 'library.php';

// пробуем запуститься, если нет ошибок  
try
  {
    // создаём объект класса generalActs
    $generalActs = new generalActs;
    //запись коннекта в переменную PDO (объект)
    $pdo = $generalActs->connect();

    // создаём краткий вывод пациентов
    // записываем его в переменную list (объект)
    $list = $generalActs->createShortList($pdo);
  }
  catch(PDOException $e) 
  {echo 'ERROR: ' . $e->getMessage();}

// форма добавить пациента
 require 'view/add.php';

// добавление пациента
  if (isset($_POST['submit']))
  {
   $add = $generalActs->adding($pdo); // зачем я это всё присваивию в add?
   // при добавлении пациента формируется новая переменная list с новыми данными
   $list = $generalActs->createShortList($pdo);
  }

    while($row = $list->fetch(PDO::FETCH_ASSOC))
    {
    //вывод кратких данных о пациенте вид
    require 'view/list.php';  
    }
;?>

</body>
</html>