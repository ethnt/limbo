<?php

function show_item($item) {
  echo '
    <div class="row panel">
      <h4><a href="items.php?id='. $item['id'] .'">'. $item['name'] .'</a></h1>
      <blockquote><p>'. $item['description'] .'</p></blockquote>
      <ul>';

        if ($item['status'] == 'found') {
          echo '<li><strong>Found at:</strong> '. $item['location'] .'</li>';
        } else {
          echo '<li><strong>Lost at:</strong> '. $item['location'] .'</li>';
        }

        if (!empty($item['email'])) {
          echo '<li><strong>Email:</strong> <a href="mailto:'. $item['email'] .'">'. $item['email'] .'</a></li>';
        }

      echo '</ul>
    </div>
  ';
}

?>
