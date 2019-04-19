<?php
return function($component, $args) {
  echo $args['controller_data'];
  return [
    'component' => $component,
    'from_controller' => $args['controller_data'],
    'items' => [
      0 => 'first'
    ]
  ];
};