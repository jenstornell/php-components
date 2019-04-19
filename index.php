<?php
include __DIR__ . '/lib/autoload.php';
include __DIR__ . '/lib/component.php';
include __DIR__ . '/lib/controller.php';
include __DIR__ . '/lib/render.php';
include __DIR__ . '/lib/root.php';

// TODO: Tests

setComponentRoot(__DIR__ . '/components');

echo render('--about', ['render_data' => 'Render data']);