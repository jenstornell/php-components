<?php
namespace JensTornell\Components;

function controller($component, $args) {
  $roots = @$GLOBALS['component']['root'];

  if(isset($roots)) {
    foreach($roots as $root) {
      $filepath = $root . '/' . $component . '/controller.php';

      if(file_exists($filepath)) {
        $controller = include($filepath);
        $GLOBALS['component']['controller'] = $controller($component, $args);
        return;
      }
    }
  }
}