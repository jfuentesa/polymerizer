<?php

require('inc/base.php');

// Instance
$pol = new \amphora\polymerizer();

// Add required components
$pol->addComponent('components/core-header-panel/core-header-panel.html');
$pol->addComponent('components/core-toolbar/core-toolbar.html');
$pol->addComponent('components/paper-tabs/paper-tabs.html');
$pol->addComponent('components/core-pages/core-pages.html');

// Add required styles
$pol->addStyle('css/common.css');

// Start output buffer
ob_start();

// Include views
include(__DIR__ . '/views/landing.php');

// Polymerize html view
echo $pol->polymerize(ob_get_clean());
