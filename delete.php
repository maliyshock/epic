<?php 
require 'library.php';

try
  {
  	$id = $_POST['id'];
   	// создаём объект класса generalActs
    $generalActs = new generalActs;
    //запись коннекта в переменную PDO (объект)
    $pdo = $generalActs->connect();
    // обращаемся к методу и передаём ему необъодимые значения
    if(!empty($id ))
    {
    	$generalActs->remove($pdo, $id);
    	$list = $generalActs->createShortList($pdo);
    	echo "yes";
    }
	}

catch(PDOException $e) 
    {echo 'ERROR: ' . $e->getMessage();}
?>