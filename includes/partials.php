<?php

function show_item($item) {
  echo '
    <article class="row">
      <p>'. $item['description'] .'</p>
    </article>
  ';
}

?>
