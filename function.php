<?php

try {
    $dotenv = new Dotenv\Dotenv (__DIR__);
    $dotenv->load();
} catch (\Exception $e) {}

function relativeURL () {
    $dir = str_replace('\\', '/', __DIR__);
    return substr($dir, strlen($_SERVER['DOCUMENT_ROOT']));
}

function startsWith($haystack, $needles) {
    foreach ((array) $needles as $needle) {
        if ($needle != '' && substr($haystack, 0, strlen($needle)) === (string) $needle) {
            return true;
        }
    }
    return false;
}

function endsWith($haystack, $needles) {
    foreach ((array) $needles as $needle) {
        if (substr($haystack, -strlen($needle)) === (string) $needle) {
            return true;
        }
    }
    return false;
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
