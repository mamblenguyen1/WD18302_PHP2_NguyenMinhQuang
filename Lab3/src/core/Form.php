<?php

namespace src\core;

use src\core\Field;

class Form
{
    public static function begin($action, $method)
    {
        echo sprintf('<form method="%s" action="%s"', $method, $action);
        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public function field($attribute)
    {
        return new Field($attribute);
    }
}
