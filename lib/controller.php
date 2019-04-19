<?php
namespace JensTornell\ComponentMagic;

function controller($component, $args) {
  global $component_magic;

  $filepath = $component_magic['root'] . '/' . $component . '/controller.php'; // Root
      
  if(!file_exists($filepath)) return;

  $controller = include($filepath);
  $component_magic['controller'] = $controller($component, $args);
}