<?php
if(isset($_POST['joketext'])) {
  try {
    include __DIR__ . '/../databasecon/database.php';
    $sql = 'INSERT INTO `jokesdb`.`joke_table` SET
    `joketext`=:joketext,
    `jokedate`="2022-07-13",
    `author_id`=4';
   $stmt = $pdo->prepare($sql);
   $stmt->bindValue(':joketext', $_POST['joketext']);
   $stmt->execute();
   header('location: jokes.php');
  }
  catch(PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . 
    $e->getFile() . ': ' . $e->getLine();
  }
} else {
  $title = 'Add a new joke';
  ob_start();
  include __DIR__ . '/../templates/addjoke.html.php';
  $output = ob_get_clean();
}

include __DIR__ . '/../templates/layout.html.php';