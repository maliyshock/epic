<?php 

try
    {
      //$name = $_GET['name'];
      $pdo = new PDO('mysql:host=localhost;dbname=scrubs', 'root', '');
      $pdo->setAttribute(
      PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION
      );

		$stmt = $pdo->prepare('DELETE FROM patients WHERE id = :id');
		$stmt->bindParam(':id', $_POST['id']);
		$stmt->execute();

		echo  $_POST['id'];
	}

catch(PDOException $e) 
    {echo 'ERROR: ' . $e->getMessage();}
?>