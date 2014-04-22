<?php

function redirect($uri) {
  $root = 'http://localhost:8080/limbo/'; # Requires trailing slash

  $url = $root . $uri;

  header('Location: ' . $url);
}

function get_by_id($table, $id) {
  $query = run('SELECT * FROM ' . $table . ' WHERE id = ' . $id . ';');

  return mysqli_fetch_array($query, MYSQLI_ASSOC);
}

function get_all($table) {
  $query = run('SELECT * FROM ' . $table . ';');

  $results = array();

  while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    array_push($results, $result);
  }

  return $results;
}

/**
 * Insert a new record into a table.
 *
 * @param  string $table      Table you're inserting into.
 * @param  Array  $attributes An associative array of the values you're inserting
 *                            (i.e., `array('foo' => 'bar')` will insert the
 *                            value 'bar' into column 'foo'.
 *
 * @return int    The ID of the inserted record.
 */
function insert($table, $attributes) {
  $keys = '';
  $values = '';

  foreach ($attributes as $key => $value) {
    $keys   = $keys . ', ' . $key;
    $values = $values . ', "' . $value . '"';
  }

  $keys = substr($keys, 2); # Remove the leading comma and space
  $values = substr($values, 2); # Remove the leading comma and space.

  $query = 'INSERT INTO ' . $table . ' (' . $keys . ') VALUES (' . $values . ')';

  $result = run($query, true);

  return $result;
}

function run($sql, $return_id = false) {
  global $dbc;

  $result = mysqli_query($dbc, $sql);
  $id     = mysqli_insert_id($dbc);
  $error  = mysqli_error($dbc);

  if ($result == false) {
    return $error;
  } else {
    if ($return_id == true) {
      return $id;
    } else {
      return $result;
    }
  }
}

function check_results($results) {
  global $dbc;

  if($results != true) {
    echo '<p>SQL ERROR = ' . mysqli_error($dbc) . '</p>';
  }
}

?>
