<?php

/**
 * Initialize the database connection.
 */
function init_db() {
  $dbc = @mysqli_connect('localhost', 'root', '', 'limbo_development');

  // If the database exists, set the charset and return.
  if($dbc) {
    mysqli_set_charset($dbc, 'utf8') ;

    return $dbc;
  }

  $dbc = @mysqli_connect('localhost', 'root', '', '');

  $query = 'CREATE DATABASE limbo_development;';

  $results = mysqli_query($dbc, $query);

  // Close the database connection.
  mysqli_close($dbc);

  // Create a new database connection to the newly made database.
  $dbc = @mysqli_connect('localhost', 'root', '', 'limbo_development') OR die (mysqli_connect_error());

  // Set charset.
  mysqli_set_charset($dbc, 'utf8');

  $sql = file_get_contents('db/migrate.sql');
  $results = mysqli_multi_query($dbc, $sql);

  mysqli_close($dbc);

  // Wait until the query finishes.
  sleep(1);

  // Try again.
  return init_db();
}

$dbc = init_db();

?>
