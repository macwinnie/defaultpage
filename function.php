<?php

function relativeURL () {
    $dir = str_replace('\\', '/', __DIR__);
    return substr($dir, strlen($_SERVER['DOCUMENT_ROOT']));
}

if (! function_exists('env')) {
    function env($key, $default = null) {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }
        if (strlen($value) > 1 && startsWith($value, '"') && endsWith($value, '"')) {
            return substr($value, 1, -1);
        }
        return $value;
    }
}
