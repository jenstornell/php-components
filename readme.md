# Component Magic

*Version 0.1*

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
ComponentMagic::root(__DIR__ . '/components');
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

Inside a component it can look like below. You always have access to the controller arguments which means you have access to `$hello` in the above example. You can also send additional arguments like `$foo` below which can then be found in the `gallery` component.

If component arguments and controller arguments has the same key, the component argument will overwrite the controller argumnents.

```php
<?= component('gallery', ['foo', 'bar']); ?>
```

### Autoload

If the component has an `autoload.php` it will be loaded directly. It can be good when needing additional functions or classes for a special template.

### Nested components

You can nest components an infinite number of times. Just send the arguments from the controller or from one component to another.

## The use of global variable

Global variables are considered to be bad practise and this repo uses a global variable. That's because of that we don't want to send the controller arguments every time with the `render()` function.

## Requirements

- PHP 7+

## Donate

Donate to [DevoneraAB](https://www.paypal.me/DevoneraAB) if you want.

## License

MIT