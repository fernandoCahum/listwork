<?php 

require_once '../controller/TasksController.php';

class TasksController
{
  private $model;

  public function __construct()
  {
    $this->model = new TasksModel;
  }
  public function set($tasks_data = array() )
  {
    return $this->model->set($tasks_data);
  }
}