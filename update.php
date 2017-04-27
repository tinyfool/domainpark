
<?php
  require __DIR__ . '/vendor/autoload.php';

  define('MAGPIE_CACHE_DIR', './cache');
  require_once(__DIR__ .  "/vendor/kellan/magpierss/rss_fetch.inc");

  $url = "http://tinyfool.org/feed/";
  $rss = fetch_rss( $url );
  
  // echo "Channel Title: " . $rss->channel['title'] . "<p>";
  // echo "<ul>";
  // foreach ($rss->items as $item) {
  //   $href = $item['link'];
  //   $title = $item['title'];
  //   echo "<li><a href=$href>$title</a></li>";
  // }
  // echo "</ul>";

  //print_r($rss);

  $smarty = new Smarty();
  $smarty->display("index.html");
?>