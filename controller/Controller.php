<?php

require_once("model/Model.php");

class Controller {

  /**
   * Model.
   *
   * @var \Model
   */
  public $model;

  /**
   * Controller constructor.
   */
  public function __construct() {
    $this->model = new Model();
  }

  /**
   * Prepares variables for view.
   *
   * Invokes model getter-methods.
   */
  public function invoke() {
    $vars = [];

    $vars['title'] = $this->model->getPageTitle();

    if (isset($_GET['some_parameter'])) {
      $vars['content'] = $this->model->getPageContent();
    }

    require_once('view/page.php');

  }
}
