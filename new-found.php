<?php
  require('includes/base.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = insert('items', $_POST['item']);

    if (is_int($result)) {
      redirect('items.php?id=' . $result);
    } else {
      echo $result;
    }
  } else {
    echo 'GET';
  }
?>

<?php require('includes/partials/header.php'); ?>

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

<?php require('includes/partials/footer.php'); ?>
