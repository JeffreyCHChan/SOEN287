<?php
$file = 'some.xml';
$dom = new DOMDocument();
$dom->load($file);
$xml = simplexml_import_dom($dom);

$i = 0;
foreach ($xml->games->game as $game) {
    ?>
  <p>
    Title: <input type="text" name="title_<?php echo $i;?>" value="<?php echo $game->title;?>" /><br />
    Genre: <input type="text" name="genre_<?php echo $i++;?>" value="<?php echo $game->genre;?>" />
  </p>
  <?php
    }
  ?>
