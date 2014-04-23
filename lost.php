<?php
  require('includes/base.php');
?>

<?php require('includes/partials/header.php'); ?>

<h3>Lost Items</h3>

<p>These items are missing!</p>

<?php

  $items = get_where('items', array('status' => 'lost'), 'updated_at desc');

  show_items($items);

?>

<?php require('includes/partials/footer.php'); ?>
