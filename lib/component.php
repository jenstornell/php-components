<?php
namespace JensTornell\ComponentMagic;

class Component {
  private $global;

  function init($id, $args) {
    $this->globalize($id);

    if(!$this->exists()) return;
    return $this->buffer($this->merge($args));
  }

  function globalize($id) {
    global $component_magic;
    $this->id = $id;
    $this->global = $component_magic;
    $this->filepath = $this->global['root'] . '/' . $this->filename();
    $this->controller = (isset($this->global['controller'])) ? $this->global['controller'] : [];
  }

  function merge($args) {
    return array_merge($this->controller, $args);
  }

  function exists() {
    return (file_exists($this->filepath));
  }

  function extension() {
    return pathinfo($this->id, PATHINFO_EXTENSION);
  }

  function filename() {
    return !empty($this->extension()) ? $this->id : $this->id . '/component.php';
  }

  function buffer($io_data) {
    ob_start();
    if(isset($io_data)) {
      extract($io_data);
      unset($io_data);
    }
    include $this->filepath;
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
  }
}