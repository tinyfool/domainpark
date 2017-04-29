
<?php
  require __DIR__ . '/vendor/autoload.php';

  define('MAGPIE_CACHE_DIR', './cache');
  define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
  define('MAGPIE_INPUT_ENCODING', 'UTF-8');
  define('MAGPIE_DETECT_ENCODING', false);

  require_once(__DIR__ .  "/vendor/kellan/magpierss/rss_fetch.inc");

  require_once __DIR__ . '/conn.php';
  require_once __DIR__ . '/fun.php';

  updateChannels();