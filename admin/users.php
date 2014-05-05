<?php
  require('../includes/base.php');

  require_admin();

  if (request_method() == 'POST') {
    $post_user = $_POST['user'];

    if ($_POST['action'] == 'create') {
      if (equality($post_user['password'], $post_user['password_confirmation'])) {
        unset($post_user['password_confirmation']);

        $post_user['password'] = encrypt($post_user['password']);
      } else {
        return redirect('users.php');
      }

      $result = insert('users', $post_user);

      if (is_int($result)) {
        redirect('users.php?id=' . $result);
      } else {
        echo $result;
      }
    }

    if ($_POST['action'] == 'update') {
      // If there is no password change, remove from the array
      if (empty($post_user['password'])) {
        unset($post_user['password']);
        unset($post_user['password_confirmation']);
      } else { // Otherwise, check and see if they match
        if ($post_user['password'] == $post_user['password_confirmation']) { // If they do match, encrypt
          unset($post_user['password_confirmation']);

          $post_user['password'] = encrypt($post_user['password']);
        } else {
          redirect('users.php?id='. $_POST['id']);
        }
      }

      $result = update_by_id('users', $_POST['id'], $post_user);

      if ($result == true) {
        redirect('users.php');
      } else {
        echo $result;
      }
    } elseif ($_POST['action'] == 'delete') {
      $result = delete_by_id('users', $_POST['id']);

      if ($result == true) {
        redirect('users.php');
      } else {
        echo $result;
      }
    }
  }

?>

<?php require('../includes/partials/admin/header.php'); ?>

<?php

  if (isset($_GET['id'])) {
    $user = get_by_id('users', $_GET['id']);

    show_user_form($user, 'users.php?id=' . $_GET['id']);
    show_user_delete_form($user, 'users.php?id=' . $_GET['id']);
  } else {
    $users = get_all('users');

    show_users_table($users);
    show_user_form(null, 'users.php', 'create');
  }
?>

<?php require('../includes/partials/admin/footer.php'); ?>
