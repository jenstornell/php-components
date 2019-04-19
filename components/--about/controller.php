<?php
return function($component, $args) {
  //echo $args['render_data'];
  return [
    'component' => $component,
    'items' => [
      0 => 'first'
    ]
  ];
};