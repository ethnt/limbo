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
<!--         <ul class="right">
          <li class="active"><a href="#">Right Button Active</a></li>
          <li class="has-dropdown">
            <a href="#">Right Button Dropdown</a>
            <ul class="dropdown">
              <li><a href="#">First link in dropdown</a></li>
            </ul>
          </li>
        </ul> -->
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

    <script src="assets/jsc/vendor/jquery.js"></script>
    <script src="assets/jsc/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
