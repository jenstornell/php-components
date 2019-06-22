<?php
namespace JensTornell\Components;

class Component {
  function init($id, $args) {
    $this->globalize($id);
    $args = array_merge($this->controller, $args);
    return $this->buffer($args);
  }

  function globalize($id) {
    $this->id = $id;
    $this->filepaths = $this->filepaths();
    $this->controller = @$GLOBALS['component']['controller'];
    if(!isset($this->controller)) $this->controller = [];
  }

  function filepaths() {
    $this->roots = @$GLOBALS['component']['root'];
    $filepaths = [];

    if(isset($this->roots)) {
      foreach($this->roots as $path) {
        $filepaths[] = $path . '/' . $this->filename();
      }
    }
    return $filepaths;
  }

  function filename() {
    if(!empty(pathinfo($this->id, PATHINFO_EXTENSION))) {
      return $this->id;
     }
     return $this->id . '/component.php';
  }

  function buffer($io_data) {
    ob_start();
    if(isset($io_data)) {
      extract($io_data);
      unset($io_data);
    }
    
    foreach($this->filepaths as $filepath) {
      if(file_exists($filepath)) {
        include $filepath;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
      }
    }
  }
}