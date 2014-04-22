<?php
  require('includes/base.php');
?>

<?php require('includes/partials/header.php'); ?>

<?php
  $items = run('select * from users where email=;');

  foreach ($item in $items){

  echo "<div id= 'item'>
        <p id = 'item_name'> " . $item['name'] ."</p><p id='description'>". 
        $item['description'] . " </p><p id='time_location'>" .
        "found on " . $item['timestamp'] . "at" . $item['location'];
		" </div>";
    }

?>

<?php require('includes/partials/footer.php'); ?>
