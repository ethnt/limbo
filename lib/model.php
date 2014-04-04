<?php

abstract class Model {
  protected $connection;
  protected $table = get_class($this);
  protected $data;

  function __construct($attributes) {

  }

  public function update($attributes) {

  }

  public function delete() {
    $sql = "DELETE FROM " . $table . "WHERE id = '" . $data[id] . "';"

    return execute($sql);
  }

  public function find($id) {
    $sql = "SELECT * FROM " . $table . " WHERE id = '" . $id ."';"

    return execute($sql);
  }

  public function where($queries) {
    $sql = "SELECT * FROM " . $table . "WHERE ";

    $queries = "";

    for ($i = 0; $i < count($queries); $i++) {
      foreach ($queries as $column => $value) {
        $query = $query . " " . $column . " = '" . $value . "'";

        if (array_pop($queries) != $value) {
          $query = $query . ", ";
        }
      }
    }

    return execute($query);
  }

  public function sort($results) { }

  protected function execute($sql) {
    mysqli_query($connection, $sql);
  }
}

?>
