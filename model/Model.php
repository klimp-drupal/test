<?php

class Model {

  /**
   * Database connection handler.
   *
   * @var \PDO
   */
  private $db;

  /**
   * Model constructor.
   *
   * @throws \Exception
   */
  public function __construct() {
    $db_host = 'localhost';
    $db_name = 'test';
    $db_user = 'root';
    $db_pass = 'ccqbmbok';

    $db_connection = new PDO(
      'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8mb4',
      $db_user,
      $db_pass,
      [
        PDO::ATTR_EMULATE_PREPARES => FALSE,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      ]
    );

    $this->db = $db_connection;
  }

  /**
   * Returns page title.
   *
   * @return string
   *   Page title.
   */
  public function getPageTitle() {
    $output = 'empty';

    $stmt = $this->db->query('SELECT title FROM data LIMIT 1');
    $title = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($title) {
      $output = reset($title);
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

    $stmt = $this->db->query('SELECT * FROM table1');
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $item) {
      $output[] = htmlentities($item['name']);
    }

    return $output;
  }

}
