<?php

use Utils\View\View;
use Utils\Configuration\Env;
use Utils\Request;
use Utils\Response;

/**
 * Encapsulado de la clase VIEW
 */
if (!function_exists('view')) {
    function view(string $viewFile, array $opts = [])
    {
        $template = new View();
        $template->render($viewFile, $opts);
    }
}

/**
 * Encapsulado de la clase ENV
 */
if (!function_exists('env_var')) {
    function env_var(string $varName, $fallBackValue = '')
    {
        $envVarValue = $fallBackValue;

        if (!empty($_ENV[$varName])) {
            $checkIfValIsBool = Env::checkIfVarEnvValueIsBoolean($_ENV[$varName]);
            $envVarValue = ($checkIfValIsBool['result']) ? $checkIfValIsBool['value'] : $_ENV[$varName];
        }

        return $envVarValue;
    }
}
/**
 * Encapsulado de la clase Request
 */
if (!function_exists('request')) {
    function request()
    {
        return new Request();
    }
}
/**
 * Encapsulado de la clase Response
 */
if (! function_exists('response')) {
    function response()
    {
        return new Response();
    }
}