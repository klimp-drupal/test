<?php

require_once("controller/Controller.php");

try {
  $controller = new Controller();
  $controller->invoke();
}
catch (Exception $e) {
  // Here we should log an exception and show an error message to user in a proper way.
  echo $e->getMessage();
}
