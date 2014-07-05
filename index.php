<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

      //$statement = $pdo->query('SELECT * FROM patients WHERE name ='. $pdo->quote($name));
      // зачем точка?
      $stmt = $pdo->prepare('SELECT * FROM patients WHERE name = :name');
      $stmt->bindParam(':name', $_GET['name'], PDO::PARAM_INT);
      $stmt->execute();
    }
    catch(PDOException $e) 
    {echo 'ERROR: ' . $e->getMessage();}

    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
    echo "<pre>";
    print_r($row);
    echo "</pre>";
    }
    //echo htmlentities($row['name']);
;?>


</body>
</html>