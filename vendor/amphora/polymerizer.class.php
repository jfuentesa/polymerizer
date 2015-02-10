<?php
/**
 *
 * Created by Javier Fuentes
 * Amphora Nuevas Tecnologías S.L.
 *
 * v2015.02.10
 *
 */

namespace amphora;

use DOMDocument;

class polymerizer {
    public $polymerSrc = 'components/polymer/polymer.html';
    public $webComponentsSRC = 'components/webcomponentsjs/webcomponents.js';
    public $metaViewport = 'width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes';
    public $components, $styles = [];

    public function addComponent($component) {
        $this->components[] = $component;
    }

    public function addStyle($style) {
        $this->styles[] = $style;
    }

    public function polymerize($buffer) {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($buffer);
        libxml_clear_errors();

        foreach ($dom->getElementsByTagName("head") as $head) {
            foreach($this->components as $component){
                $link = $dom->createElement('link');
                $link->setAttribute('rel', 'import');
                $link->setAttribute('href', $component);

                $head->appendChild($link);
            }

            foreach($this->styles as $style){
                $link = $dom->createElement('link');
                $link->setAttribute('rel', 'stylesheet');
                $link->setAttribute('href', $style);

                $head->appendChild($link);
            }

            $js = $dom->createElement('script');
            $js->setAttribute('type', 'text/javascript');
            $js->setAttribute('src', $this->webComponentsSRC);
            $head->appendChild($js);

            $link = $dom->createElement('link');
            $link->setAttribute('rel', 'import');
            $link->setAttribute('href', $this->polymerSrc);
            $head->appendChild($link);

            if (!empty($this->metaViewport)) {
                $meta = $dom->createElement('meta');
                $meta->setAttribute('name', 'viewport');
                $meta->setAttribute('content', $this->metaViewport);
                $head->appendChild($meta);
            }
        }

        return $dom->saveHTML();
    }
} 