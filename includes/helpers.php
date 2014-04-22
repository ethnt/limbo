<?php

/**
 * Redirect to a page.
 *
 * @param  string $base The base of the URL (i.e., domain and subdirectory)
 * @param  Array  $uri  The resource to be redirected to.
 *
 * @return null
 */
function redirect($base = 'http://localhost:8080/limbo/', $uri) {
  $url = $base . $uri;

  header('Location: ' . $url);
}

/**
 * Get a row by ID.
 *
 * @param  string $table Table to fetch the row from.
 * @param  Array  $id    ID of the row.
 *
 * @return mysql_result
 */
function get_by_id($table, $id) {
  $query = run('SELECT * FROM ' . $table . ' WHERE id = ' . $id . ';');

  return mysqli_fetch_array($query, MYSQLI_ASSOC);
}

/**
 * Get all of the rows in a table.
 *
 * @param  string $table Table to fetch the rows from.
 * @param  string $sort  The sort you're using (e.g., `timestamp asc`).
 *
 * @return array         Array of results.
 */
function get_all($table, $sort = null) {
  $sql = 'SELECT * FROM ' . $table;

  if (is_null($sort)) {
    $sql = $sql . ';';
  } else {
    $sql = $sql . ' order by ' . $sort . ';';
  }

  $query = run($sql);

  $results = array();

  while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
    array_push($results, $result);
  }

  return $results;
}

/**
 * Get a subset of a table's rows based on the parameters.
 *
 * @param  string $table     Table to fetch the rows from.
 * @param  array $parameters An associative array that designates the query,
 *                           (e.g., `array('name' => 'Foobar')`).
 * @param  string $sort      The sort you're using (e.g., `timestamp asc`).
 *
 * @return array             An array of results.
*/
function get_where($table, $parameters, $sort = null) {
  $sql = 'SELECT * FROM ' . $table . ' WHERE ';

  foreach ($parameters as $column => $value) {
    $sql = $sql . $column . '="' . $value . '" AND '/
  }

  $sql = substr($sql, 0, -4); # Remove the last ` AND`

  if (is_null($sort)) {
    $sql = $sql . ';'
  } else {
    $sql = $sql . ' order by ' . $sort . ';';
  }

  $query = run($sql);

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
 * @return int                The ID of the inserted record.
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

/**
 * Run an SQL query on the database.
 *
 * @param  string  $sql       The SQL to run.
 * @param  boolean $return_id If running an INSERT command, return the ID of the inserted row.
 *
 * @return int                The ID of the inserted record (if $return_id == true).
 * @return boolean            True if SQL ran successfully.
 * @return string             The error if it failed.
 */
function run($sql, $return_id = false) {
  global $dbc;

  $result = mysqli_query($dbc, $sql);
  $id     = mysqli_insert_id($dbc);
  $error  = mysqli_error($dbc);

  if ($result == false) { # If it fails, return the error.
    return $error;
  } else {
    if ($return_id == true) { # If it succeeds and $return_id is true, return the ID.
      return $id;
    } else { # Otherwise, just return the boolean (true).
      return $result;
    }
  }
}

?>
