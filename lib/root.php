<?php
class ComponentMagic {
  function root($root) {
    global $component_magic;
    $component_magic['root'] = $root;
  }
}