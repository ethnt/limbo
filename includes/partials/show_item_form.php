<?php

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

?>
