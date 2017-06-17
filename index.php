<?php

require_once("controller/Controller.php");

try {
  $controller = new Controller();
  $controller->invoke();
}
catch (Exception $e) {
  echo $e->getMessage();
}
