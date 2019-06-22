<?php
// Render
function render($component, $args) {
  JensTornell\Components\autoload($component);
  JensTornell\Components\controller($component, $args);
  
  return component($component);
}


// Component
function component($id, $args = []) {
  $Component = new JensTornell\Components\Component();
  return $Component->init($id, $args);
}