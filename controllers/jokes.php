<?php
try {
  include __DIR__ . '/../databasecon/database.php';
  $sql = 'SELECT `joke_table`.`id`,`joketext` FROM `jokesdb`.`joke_table`';
  $result = $pdo->query($sql);
  $jokes = $result;
  $title = 'Joke List';
  $output = '';

  ob_start();
  include __DIR__ . '/../templates/jokes.html.php';
  $output = ob_get_clean();
  
} catch(PDOException $e) {
  $error = 'Unable to connect to the database server: ' . 
$e->getMessage();
}

include __DIR__ . '/../templates/layout.html.php';

