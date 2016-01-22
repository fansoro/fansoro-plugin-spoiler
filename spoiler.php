<?php

/**
 * Fansoro Spoiler Plugin
 *
 * (c) Romanenko Sergey / Awilum <awilum@msn.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
Action::add('theme_header', function () {
    echo('<link rel="stylesheet" href="'.Url::getBase().'/plugins/spoiler/lib/style.css">');
});

Action::add('theme_footer', function () {
    echo('<script src="'.Url::getBase().'/plugins/spoiler/lib/script.js"></script>');
});

Shortcode::add('spoiler', function ($attributes, $content) {

    // Extract
    extract($attributes);

    if (isset($title)) {
        $class = (isset($class)) ? $class : 'sp-default';
        $current = (isset($show) and $show == true) ? ' current' : '';

        $template = Template::factory(PLUGINS_PATH . '/spoiler/templates/');

        $template->setOptions([
            "strip" => true
        ]);

        return $template->fetch(
            'spoiler.tpl',
            [
                'class'   => $class,
                'current' => $current,
                'title'   => $title,
                'content' => $content,
            ]
        );
    }
});
