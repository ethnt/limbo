<?php
  require('includes/base.php');
?>

<?php require('includes/partials/header.php'); ?>

<?php

  if (isset($_GET['id'])) {
    $item = get_by_id('items', $_GET['id']);

    show_item($item);
    // echo '<article class="row">';
    // echo '<p>' . $item['description'] . '</p>';
    // echo '</article>';
  } else {
    $items = get_all('items');
  }

?>

<?php require('includes/partials/footer.php'); ?>
