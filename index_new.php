<?php

$db_connection = new mysqli('localhost', 'root', 'ccqbmbok', 'test');
if ($db_connection->connect_error) {
  die('Error : ('. $db_connection->connect_errno .') '. $db_connection->connect_error);
}

function getPageTitle() {
  $title = 'empty';

  global $db_connection;
  $result = $db_connection->query('SELECT title FROM data LIMIT 1');
  if ($result) {
    $result->data_seek(0);
    $row = $result->fetch_row();
    if (!empty($row)) {
      $title = reset($row);
    }
  }

  return htmlentities($title);
}

?>

<html>
  <head>
    <title><?php echo getPageTitle(); ?></title>
  </head>

  <body>
    <?php if (isset($_GET['some_parameter'])): ?>

      <?php
        $result = $db_connection->query('SELECT * FROM table1');
      ?>

      <?php if ($result): ?>
        <?php $result->data_seek(0); ?>

        <ul>
          <?php while($row = $result->fetch_assoc()) : ?>
            <li><?php	echo htmlentities($row['name']); ?></li>
          <?php endwhile; ?>
        </ul>

      <?php endif; ?>

    <?php endif; ?>

  </body>
</html>
