<?php
include __DIR__ . '/component-magic.php';

$ComponentMagic = new ComponentMagic(__DIR__ . '/components');
$page = $ComponentMagic->render('--about', ['controller_data' => 'Controller data']);

echo $page;