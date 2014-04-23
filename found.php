<?php
  require('includes/base.php');
?>

<?php require('includes/partials/header.php'); ?>

<h3>Found Items</h3>

<p>These items have been found and are looking for their owner!</p>

<?php

  $items = get_where('items', array('status' => 'found'), 'updated_at desc');

  show_items($items);

?>

<?php require('includes/partials/footer.php'); ?>
