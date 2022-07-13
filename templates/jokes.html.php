<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <title>Form example</title>
 </head>
 <body>
<p>
  <?php 
if(isset($error)):
  ?>
  <p>
  <?php echo $error ?>
  </p>
<?php
  else:
  foreach($jokes as $joke): ?>
  <blockquote>
  <p>
  <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?>
  <form action=deletejoke.php" method="post">
  <input type="hidden" name="id" value="<?=joke['id']?>">
  <input type="submit" value="Delete">
  </form>
  </p>
  </blockquote>
  <?php
  endforeach; ?>
<?php
endif;
?>
</body>
</html>