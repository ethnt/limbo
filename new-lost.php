<?php
  require('includes/base.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = insert('items', $_POST['item']);

    if (is_int($result)) {
      redirect('items.php?id=' . $result);
    } else {
      echo $result;
    }
  }
?>

<?php require('includes/partials/header.php'); ?>

<h3>Lost an item?</h3>

<form action="new-lost.php" method="post">
  <input type="hidden" name="item[status]" value="lost" />
  <div class="row">
    <div class="large-12 columns">
      <label>Name</label>
      <input name="item[name]" placeholder="Name of item" type="text" />
    </div>
    <div class="large-12 columns">
      <label>Location</label>
      <input name="item[location]" placeholder="Location of item" type="text" />
    </div>
    <div class="large-12 columns">
      <label>Description</label>
      <textarea name="item[description]" placeholder="Item description."></textarea>
    </div>
    <div class="large-12 columns">
      <label>Email</label>
      <input name="item[email]" placeholder="Your email (optional)" type="email" />
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <button class="buttom small" type="submit">Save</button>
    </div>
  </div>
</form>

<?php require('includes/partials/footer.php'); ?>
