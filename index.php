<?php

require('inc/base.php');

ob_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Polymer WebApp</title>
</head>
<!-- The unresolved attribute on the <body> element is used to prevent a flash of unstyled content (FOUC) on browsers that lack native support for custom elements. For details, see the Polymer styling reference. -->
<body unresolved>
<core-header-panel>
    <core-toolbar>
        <paper-tabs id="tabs" selected="all" self-end>
            <paper-tab name="all">All</paper-tab>
            <paper-tab name="favorites">Favorites</paper-tab>
        </paper-tabs>
    </core-toolbar>
</core-header-panel>
</body>
</html>
<?php

$pol = new \amphora\polymerizer();
$pol->addComponent('components/core-header-panel/core-header-panel.html');
$pol->addComponent('components/core-toolbar/core-toolbar.html');
$pol->addComponent('components/paper-tabs/paper-tabs.html');
$pol->addStyle('css/common.css');
echo $pol->polymerize(ob_get_clean());
