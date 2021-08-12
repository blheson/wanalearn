<?php

namespace Cheap_Learning_Fast\Helpers;
use Cheap_Learning_Fast\Plugin;
class View
{
    public static $base = 'view/';

    public static function render($view, $vars = [])
    {

        foreach ($vars as $var => $value) {
            $$var = $value;
        }
        if ($view_parts = explode('.', $view)) {
            include_once Plugin::get_instance()->get_path() . self::$base . implode('/', $view_parts) . '.php';
           
        } else {
            include_once Plugin::get_instance()->get_path() . self::$base . $view . '.php';
        }
    }
}
