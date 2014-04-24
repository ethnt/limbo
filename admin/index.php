<?php
  require('../includes/base.php');

  require_admin();
?>

<?php require('../includes/partials/admin/header.php'); ?>

<h1>Admininstration</h1>

<?php

  if (isset($_GET['id'])) {
    $item = get_by_id('items', $_GET['id']);

    show_item($item);
  } else {
    $items = get_where('items', array('claimed' => 0), 'updated_at desc');
    $claimed = get_where('items', array('claimed' => 1), 'updated_at desc');

    show_items_table($items);

    echo '<h3>Claimed Items</h3>';

    show_items_table($claimed);
  }

?>

<?php require('../includes/partials/admin/footer.php'); ?>
