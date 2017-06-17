<?php

function getPageTitle() {

  return mysql_result('SELECT title FROM data', 0, 'title');
}
?>

<html>
  <head>
    <title><?php echo htmlentities(getPageTitle()); ?></title>
  </head>

  <body>
    <?php if ($_GET['some_parameter']) { ?>
    <ul>
      <?php
        mysql_connect('localhost', 'root', 'ccqbmbok');
        mysql_select_db('test');
        $query = mysql_query('SELECT * FROM table1');
        while ($row = mysql_fetch_assoc($query)) {
      ?>
        <li><?php	echo htmlentities($row['some_field']); ?></li>
      <?php    } ?>
    </ul>
    <?php } ?>
  </body>
</html>
