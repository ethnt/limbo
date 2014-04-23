<?php
  require('../includes/base.php');

  require_admin();

  if (request_method() == 'POST') {
    if ($_POST['action'] == 'update') {
      if (!isset($_POST['item']['claimed'])) {
        $_POST['item']['claimed'] = 0;
      }

      $result = update_by_id('items', $_POST['id'], $_POST['item']);

      if ($result == true) {
        redirect('http://localhost:8080/limbo/admin/', 'index.php');
      } else {
        echo $result;
      }
    } elseif ($_POST['action'] == 'delete') {
      $result = delete_by_id('items', $_POST['id']);

      if ($result == true) {
        redirect('http://localhost:8080/limbo/admin/', 'index.php');
      } else {
        echo $result;
      }
    }
  }

?>

<?php require('../includes/partials/admin/header.php'); ?>

<?php

  if (isset($_GET['id'])) {
    $item = get_by_id('items', $_GET['id']);

    show_item_form($item, 'items.php?id=' . $_GET['id']);
    show_item_delete_form($item, 'items.php?id=' . $_GET['id']);
  } else {
    $items = get_all('items');

    show_items_table($items);
  }

?>

<?php require('../includes/partials/admin/footer.php'); ?>
