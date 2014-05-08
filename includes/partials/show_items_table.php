<?php

function show_items_table($items) {
  echo '
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Created At</th>
          <th>Updated At</th>
          <th>Location</th>
          <th>Email</th>
          <th>Status</th>
          <th>Claimed</th>
        </tr>
      </thead>
      <tbody>
  ';

  foreach ($items as $item) {
    echo '
      <tr>
        <td><a href="items.php?id='. $item['id'] .'">'. $item['id'] .'</a></td>
        <td>'. $item['name'] .'</td>
        <td>'. $item['description'] .'</td>
        <td>'. $item['created_at'] .'</td>
        <td>'. $item['updated_at'] .'</td>
        <td>'. $item['location'] .'</td>
        <td>'. $item['email'] .'</td>
        <td>'. $item['status'] .'</td>
        ';

        if ($item['claimed'] == 1) {
          echo '<td>Yes</td>';
        } else {
          echo '<td>No</td>';
        }

    echo '
      </tr>
    ';
  }

  echo '
    </table>
  ';
}

?>
