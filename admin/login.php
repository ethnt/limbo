<?php
  require('../includes/base.php');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = check_credentials($_POST['user']['username'], $_POST['user']['password'])[0];

    if ($user == false) {
      echo 'nope!';
    } else {
      $_SESSION['current_user'] = $user['id'];

      redirect('index.php');
    }
  }
?>

<?php require('../includes/partials/admin/header.php'); ?>

<h1>Admininstration</h1>
<h2>Login</h2>

<form action="login.php" method="post">
  <div class="row">
    <div class="large-12 columns">
      <label>
        Username
      </label>
      <input name="user[username]" placeholder="Username" type="text" />
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <label>
        Password
      </label>
      <input name="user[password]" placeholder="Password" type="password" />
    </div>
  </div>
  <div class="row">
    <div class="large-12 columns">
      <button class="button small" type="submit">Login</button>
    </div>
  </div>
</form>

<?php require('../includes/partials/admin/footer.php'); ?>
