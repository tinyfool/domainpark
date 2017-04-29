
<?php
  require __DIR__ . '/vendor/autoload.php';

  define('MAGPIE_CACHE_DIR', './cache');
  require_once(__DIR__ .  "/vendor/kellan/magpierss/rss_fetch.inc");

  require_once __DIR__ . '/conn.php';
  require_once __DIR__ . '/fun.php';


	$data = contents();
  $smarty = new Smarty();
  $smarty->assign("data",$data);
  $smarty->display("index.html");
?>