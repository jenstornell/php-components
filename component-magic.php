<?php
// TODO: Bättre testdata
// TODO: Använd ej superglobal. Istället $component_magic

class ComponentMagic {
  private $global;
  
  public function __construct($root) {
    $this->root = $root;
  }

  // Render all
  public function render($component, $args) {
    $this->autoload($component);
    $this->controller($component, $args);
  
    return $this->component($component);
  }

  // Autoload
  function autoload($component) {
    $filepath = $this->root . '/' . $component . '/autoload.php';
    
    if(file_exists($filepath)) {
      include($filepath);
    }
  }

  // Controller
  function controller($component, $args) {
    $controllerpath = $this->root . '/' . $component . '/controller.php';
      
    if(!file_exists($controllerpath)) return;

    $controller = include($controllerpath);
    $GLOBALS['data'] = $controller($component, $args);
  }

  //Component
  function component($id, $args = []) {
    $this->vars($id);
    if(!file_exists($GLOBALS['io']['component']['filepath'])) return false;
    $data = $this->data($args);
    return $this->buffer($id, $data);
  }

  function vars($id) {
    $extension = pathinfo($id, PATHINFO_EXTENSION);
    $filename = !empty($extension) ? $id : $id . '/component.php';
    $GLOBALS['io']['component'] = [
      'id' => $id,
      'filepath' => $this->root . '/' . $filename
    ];
  }

  function data($args) {
    if(!isset($GLOBALS['data'])) return $args;
    return array_merge($GLOBALS['data'], $args);
  }

  function buffer($id, $io_data) {
    print_r($io_data);
    ob_start();
    if(isset($io_data)) {
      extract($io_data);
      unset($id, $io_data);
    }
    include $GLOBALS['io']['component']['filepath'];
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
  }
}

function component($id, $args = []) {
  $ComponentMagic = new ComponentMagic(__DIR__ . '/component-magic.php');
  return $ComponentMagic->component($id, $args);
}