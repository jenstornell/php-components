<?php
include __DIR__ . '/lib/init.php';

$GLOBALS['component']['root'] = [__DIR__ . '/components', __DIR__ . '/components2'];

echo render('--about', ['render_data' => 'Render data']);