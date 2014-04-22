<?php
  require('includes/base.php');
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Limbo</title>

    <link rel="stylesheet" href="assets/css/foundation.css" />

    <script src="assets/jsc/vendor/modernizr.js"></script>
  </head>
  <body>
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">Limbo</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
      </ul>
      <section class="top-bar-section">
        <ul class="right">
          <li class="has-form"><a class="button" href="new-found.php">Found Item</a></li>
          <li class="has-form"><a class="button" href="new-lost.php">Lost Item</a></li>
        </ul>
        <ul class="left">
          <li><a href="lost.php">Lost</a></li>
          <li><a href="found.php">Found</a></li>
        </ul>
      </section>
    </nav>
    <main>
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
    </main>
    <script src="assets/jsc/vendor/jquery.js"></script>
    <script src="assets/jsc/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
