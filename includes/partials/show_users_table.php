<?php

function show_users_table($users) {
  echo '
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Email</th>
          <td>Level</th>
        </tr>
      </thead>
      <tbody>
  ';

  foreach ($users as $user) {
    echo '
      <tr>
        <td><a href="users.php?id='. $user['id'] .'">'. $user['id'] .'</a></td>
        <td>'. $user['username'] .'</td>
        <td>'. $user['email'] .'</td>
        <td>'. $user['level'] .'</td>
      </tr>
    ';
  }

  echo '
    </table>
  ';
}

?>
