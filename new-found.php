<?php
  require('includes/base.php');

  if (is_post()) {
    $result = insert('items', $_POST['item']);

    if (is_int($result)) {
      http_redirect('items.php', array('id' => $result));
    } else {
      echo $result;
    }

  }
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
      <form action="new-found.php" method="post">
        <div class="row">
          <div class="large-12 columns">
            <label>
              Description
              <textarea name="item[description]" placeholder="Item description."></textarea>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <button type="submit">Save</button>
          </div>
        </div>
      </form>
    </main>

    <script src="assets/jsc/vendor/jquery.js"></script>
    <script src="assets/jsc/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
