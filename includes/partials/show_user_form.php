<?php

function show_user_form($user = null, $resource = 'users.php', $action = 'update') {
  echo '
    <form action="'. $resource .'" method="post">
      <input type="hidden" name="action" value="'. $action .'" />
      <input type="hidden" name="id" value="'. $user['id'] .'" />
      <div class="row">
        <div class="large-12 columns">
          <label>Username</label>';
          if (strlen($user['username']) > 0) {
            echo '<input name="user[username]" placeholder="Username of user" type="text" value="'. $user['username'] .'" />';
          } else {
            echo '<input name="user[username]" placeholder="Username of user" type="text" value="" />';
          }
        echo '</div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <label>Email</label>';
          if (strlen($user['email']) > 0) {
            echo '<input name="user[email]" placeholder="Email of user" type="email" value="'. $user['email'] .'" />';
          } else {
            echo '<input name="user[email]" placeholder="Email of user" type="email" value="" />';
          }
        echo '</div>
      </div>
      <div class="row">
        <div class="large-6 columns">
          <label>Password</label>
          <input name="user[password]" placeholder="Password (leave blank if not changing)" type="password" value="" />
        </div>
        <div class="large-6 columns">
          <label>Password confirmation</label>
          <input name="user[password_confirmation]" placeholder="Confirm your password if changing" type="password" value="" />
        </div>
      </div>
      <div class="row">
        <div class="large-12 columns">
          <button class="button small" type="submit">Save</button>
        </div>
      </div>
    </form>
  ';
}

?>
