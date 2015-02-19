<?php
// You can add tags with $pol->append('web-comonent');
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
    <core-toolbar id="mainheader">
        <span flex>Polymerizer demo</span>
    </core-toolbar>
    <core-toolbar>
        <paper-tabs id="tabs" self-end>
            <paper-tab>All</paper-tab>
            <paper-tab>Favorites</paper-tab>
        </paper-tabs>
    </core-toolbar>
    <core-pages id="pages">
        <div class="content">
            <p>One</p>
        </div>
        <div class="content">
            <p>Two</p>
        </div>
    </core-pages>
</core-header-panel>

<script>
    var tabs = document.getElementById('tabs');
    var pages = document.getElementById('pages');
    tabs.addEventListener('core-select', function(){
        pages.selected = tabs.selected;
    });
</script
</body>
</html>
