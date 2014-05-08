<?php

function show_user_delete_form($user, $resource = 'users.php') {
  echo '
    <form action="'. $resource .'" method="post">
      <input type="hidden" name="action" value="delete" />
      <input type="hidden" name="id" value="'. $user['id'] .'" />
      <button class="button small alert" type="submit">Delete</button>
    </form>
  ';
}

?>
