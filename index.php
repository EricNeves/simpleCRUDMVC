<?php

require_once __DIR__."/config.php";
require_once __DIR__."/app/router/routes.php";
require_once __DIR__."/app/core/Core.php";

spl_autoload_register(function($file) {
  if (file_exists(__DIR__."/app/utils/$file.php")) {
    require_once __DIR__."/app/utils/$file.php";
  }
  else if (file_exists(__DIR__."/app/models/$file.php")) {
    require_once __DIR__."/app/models/$file.php";
  }
}); 

$core = new Core($routes);
$core->run();