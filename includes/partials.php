<?php

  function show_item($item) {
    echo '
      <div class="row panel">
        <h4><a href="items.php?id='. $item['id'] .'">'. $item['name'] .'</a></h1>
        <blockquote><p>'. $item['description'] .'</p></blockquote>
        <ul>
          <li><strong>Found at:</strong> '. $item['location'] .'</li>
          <li><strong>Email:</strong> <a href="mailto:'. $item['email'] .'">'. $item['email'] .'</a></li>
        </ul>
      </div>
    ';
  }

  function show_items($items) {
    foreach ($items as $item) {
      show_item($item);
    }
  }

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

  function show_item_form($item, $resource = 'items.php', $action = 'update') {
    echo '
      <form action="'. $resource .'" method="post">
        <input type="hidden" name="action" value="'. $action .'" />
        <input type="hidden" name="id" value="'. $item['id'] .'" />
        <div class="row">
          <div class="large-12 columns">
            <label>Name</label>
            <input name="item[name]" placeholder="Name of item" type="text" value="'. $item['name'] .'" />
          </div>
          <div class="large-12 columns">
            <label>Location</label>
            <input name="item[location]" placeholder="Location of item" type="text" value="'. $item['location'] .'" />
          </div>
          <div class="large-12 columns">
            <label>Description</label>
            <textarea name="item[description]" placeholder="Item description.">'. $item['description'] .'</textarea>
          </div>
          <div class="large-12 columns">
            <label>Email Address</label>
            <input name="item[email]" placeholder="Your email (optional)" type="email" />
          </div>
          <div class="large-12 columns">
            <label>Status</label>
            <select name="item[status]">';
              if ($item['status'] == 'found') {
                echo '
                  <option name="found" selected="selected">Found</option>
                  <option name="lost">Lost</option>
                ';
              } else {
                echo '
                  <option name="found">Found</option>
                  <option name="lost" selected="selected">Lost</option>
                ';
              }
            echo '</select>
          </div>
          <div class="large-12 columns">
            <label>Claimed?</label>';
            if ($item['claimed'] == 0) {
              echo '<input name="item[claimed]" value="1" type="checkbox" />';
            } else {
              echo '<input name="item[claimed]" value="1" type="checkbox" checked="checked" />';
            }
          echo '</div>
        </div>
        <div class="row">
          <div class="large-12 columns">
            <button class="button small" type="submit">Save</button>
          </div>
        </div>
      </form>
    ';
  }

  function show_item_delete_form($item, $resource = 'items.php') {
    echo '
      <form action="'. $resource .'" method="post">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="id" value="'. $item['id'] .'" />
        <button class="button small alert" type="submit">Delete</button>
      </form>
    ';
  }

?>
