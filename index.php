<?php

require('inc/base.php');

// Start output buffer
ob_start();

// Include views
include(__DIR__ . '/views/landing.php');

// Polymerize html view
\amphora\polymerizer::factory()
    ->addComponent('components/core-header-panel/core-header-panel.html')
    ->addComponent('components/core-toolbar/core-toolbar.html')
    ->addComponent('components/paper-tabs/paper-tabs.html')
    ->addComponent('components/core-pages/core-pages.html')
    ->addStyle('css/common.css')
    ->polymerize(ob_get_clean());
