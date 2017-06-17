<?php

class Model {

  /**
   * Database connection handler.
   *
   * @var \mysqli
   */
  private $dbConnection;

  /**
   * Model constructor.
   *
   * @throws \Exception
   */
  public function __construct() {
    $db_connection = new mysqli('localhost', 'root', 'ccqbmbok', 'test');
    if ($db_connection->connect_error) {
      throw new \Exception('Error : ('. $db_connection->connect_errno .') '. $db_connection->connect_error);
    }
    $this->dbConnection = $db_connection;
  }

  /**
   * Returns page title.
   *
   * @return string
   *   Page title.
   */
  public function getPageTitle() {
    $output = 'empty';

    $result = $this->dbConnection->query('SELECT title FROM data LIMIT 1');
    if ($result) {
      $result->data_seek(0);
      $row = $result->fetch_row();
      if (!empty($row)) {
        $output = reset($row);
      }
    }

    return htmlentities($output);
  }

  /**
   * Returns page content.
   *
   * @return array|bool
   *   Either an array of elements or FALSE if there aren't any.
   */
  public function getPageContent() {
    $output = FALSE;
    $result = $this->dbConnection->query('SELECT * FROM table1');
    if ($result) {
      $result->data_seek(0);
      while($row = $result->fetch_assoc()) {
        if (!empty($row['name'])) {
          $output[] = htmlentities($row['name']);
        }
      }
    }

    return $output;
  }

}
