<?php
namespace JensTornell\ComponentMagic;

function autoload($component) {
  global $component_magic;

  $filepath = $component_magic['root'] . '/' . $component . '/autoload.php'; // ROOT
    
  if(file_exists($filepath)) {
    include($filepath);
  }
}