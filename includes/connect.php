<?php

$dbc = @mysqli_connect('localhost', 'root', '', 'limbo_development') OR die(mysqli_connect_error());

mysqli_set_charset($dbc, 'utf8');

?>
