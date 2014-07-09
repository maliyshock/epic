<?php 

class generalActs
{
	function createShortList($pdo)
	{
		  $stmt = $pdo->prepare('SELECT id, name, photo, email, sex FROM patients');
	    $stmt->execute();
	    return $stmt;
    }

	function connect()
	{
			$pdo = new PDO('mysql:host=localhost;dbname=scrubs', 'root', '');
      $pdo->setAttribute(
      PDO::ATTR_ERRMODE,
      PDO::ERRMODE_EXCEPTION
      );
	  return $pdo;
  }

	function adding($pdo)
	{
		$add = $pdo->prepare('INSERT INTO patients (name, email, sex, insurance_num, card_num, history ) VALUES(:name, :email, :sex, :insurance_num, :card_num, :history )');
    $add->execute(array(':name' => $_POST['name'],
              ':email' => $_POST['email'],
              ':sex' => $_POST['sex'],
              ':insurance_num' => $_POST['insurance_num'],
              ':card_num' => $_POST['card_num'],
              ':history' => $_POST['history']
            ));
	  return $add;
  }

	function remove($pdo, $id)
	{
		$remove = $pdo->prepare('DELETE FROM patients WHERE id = :id');
		$remove->bindParam(':id', $id);
		$remove->execute();
		return $remove;
	}
}

 ?>