<?php

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
