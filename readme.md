# Component Magic

If you are making a CMS, this library might come in handy. It loads components (snippets if you like) with controllers.

## In short

- Very small library
- Easy to use
- No dependencies

## Usage

You can look at the `index.php` file of this project to see how it works.

### Setup the root

First you need to set the root of the project.

```php
setComponentRoot(__DIR__ . '/components');
```

### Render the template component

You can render a component template like below. The first argument is the folder name. The second argument is the arguments that will be sent to the controller if the controller exists.

**Example:**

Below will load the `--about` template controller and also send an array as arguments to the controller.

```php
echo render('--about', ['render_data' => 'Render data']);
```

In the files and folders it looks like this.

```text
--about
  autoload.php
  controller.php
  component.php
```

### Controller

The `$component` is the name of the component folder, `--about` in the above example. The `$args` is the arguments sent from the render second argument.

```php
return function($component, $args) {
  return [
    'hello' => 'world'
  ];
};
```

### Component

Inside a component it can look like below. I always have access to the controller arguments which means I have access to `$hello` in the above example. I can also send additional arguments like `$foo` below which can then be found in the `gallery` component.

If component arguments and controller arguments has the same key, the component argument will overwrite the controller argumnents.

```php
<?= component('gallery', ['foo', 'bar']); ?>
```

### Autoload

If the component has an `autoload.php` it will be loaded directly. It can be good when needing additional functions or classes for a special template.

### Nested components

You can nest components an infinite number of times. Just send the arguments from the controller or from one component to another.

## The use of global variable

## Donate