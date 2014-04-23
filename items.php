<?php
  require('includes/base.php');
?>

<?php require('includes/partials/header.php'); ?>

<h3>All items</h3>

<?php

  if (isset($_GET['id'])) {
    $item = get_by_id('items', $_GET['id']);

    echo '<p><a href="items.php">Back to all items</a></p>';

    show_item($item);
  } else {
    $items = get_all('items');

    show_items($items);
  }

?>

<?php require('includes/partials/footer.php'); ?>
