<?php
  require('includes/base.php');
?>

<?php require('includes/partials/header.php'); ?>

<h3>Search</h3>

<form action="search.php" method="get">
  <div class="row">
    <div class="large-12 columns">
      <input name="q" placeholder="What are you looking for?" type="text" value="<?php echo $_GET['q'] ?>" />
    </div>
  </div>
</form>

<?php

  if (isset($_GET['q'])) {
    $items = search('items', 'name', $_GET['q']);

    if (count($items) > 0) {
      show_items($items);
    } else {
      echo '<p>No results.</p>';
    }
  }

?>

<?php require('includes/partials/footer.php'); ?>
