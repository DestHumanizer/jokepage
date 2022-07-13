try {
  // pag. 211
  //include __DIR__ . '/../databasecon/database.php';
  $pdo = new PDO('mysql:host=localhost;dbnamce=jokesdb;charset=utf8mb4',
  'root', 'mysql');
  $sql = 'DELETE FROM `jokesdb`.`joke_table` WHERE 
     `joke_table`.`id`=:id';
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $_POST['id']);
  $stmt->execute();
  header('location: jokes.php');
}
catch(PDOException $e) {
  $title = 'An error has occured';

  $output = 'Unable to connect to the database server: ' .
  $e->getMessage() . ' in ' . $e->getFile() . ': ' . $e->getLine();
}

include __DIR__ . '/../templates/layout.html.php';