<?php
namespace JensTornell\Components;

function autoload($component) {
  $roots = $GLOBALS['component']['root'];

  foreach($roots as $path) {
    $filepath = $path . '/' . $component . '/autoload.php';
    
    if(file_exists($filepath)) {
      include($filepath);
      return;
    }
  }
}