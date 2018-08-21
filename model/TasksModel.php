<?php 

require_once '../config/Model.php';

class TasksModel extends Model{

  public function set($tasks_data = array())
  {
    foreach ($tasks_data as $key => $value) {
      $$key = $value;
    }
    $this->query = "INSERT INTO tasks VALUES (
      $id, '$task', '$is_complete', '$created_at', '$updated_at')";

    $this->set_query();
  }

  public function get($task_id = '')
  {
    $this->query = ($task_id != '') ? "SELECT * FROM tasks WHERE id = '$task_id' " : "SELECT * FROM tasks";

    $this->get_query();

    $num_rows = count($this->rows);

    $data = array();
    foreach ($this->rows as $key => $value) {
      array_push($data, $value);
    }
    return $data;
  }

  public function del($task_id = '')
  {
    $this->query = "DELETE FROM tasks WHERE id = '$task_id'";
    $this->set_query();
  }
}
