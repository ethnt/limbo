<?php
  require('includes/base.php');
?>

<?php require('includes/partials/header.php'); ?>

<?php
  $items = get_all('items');

  while ($row = mysqli_fetch_array($items, MYSQLI_ASSOC)) {
    echo $row;
  }
?>

<?php require('includes/partials/footer.php'); ?>
