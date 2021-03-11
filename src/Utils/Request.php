<?php

namespace Utils;

class Request
{
    const PARAMETER_PATTERN = '/:([^\/]+)/';
    const PARAMETER_REPLACEMENT = '(?<\1>[^/]+)';

    protected $uri;
    protected $params;

    public function __construct()
    {
        $this->setUri();
    }

    public function isRouteUrisMatch(string $uriPattern)
    {
        $uri = explode('?', $this->getUri())[0];
        return (object)[
            'result' => (preg_match($uriPattern, $uri, $matches)),
            'matches' => $matches,
        ];
    }


    public function getUriPattern(string $routeUri)
    {
        $uriPattern = preg_replace(self::PARAMETER_PATTERN, self::PARAMETER_REPLACEMENT, $routeUri);
        $uriPattern = str_replace('/', '\/', $uriPattern);
        $uriPattern = '/^' . $uriPattern . '\/*$/s';

        return $uriPattern;
    }

    public function processParams($uriMatches, $routeUri)
    {
        preg_match_all(self::PARAMETER_PATTERN, $routeUri, $parameterNames);
        $paramNames = array_flip($parameterNames[1]);
        $this->setParams(array_intersect_key($uriMatches, $paramNames));
    }

    /**
     * Comprueba el metodo que le pasamemos POST/GET y campara con el REQUEST
     *
     * @param string $method
     * @return boolean
     */
    public function isMethod(string $method)
    {
        return (strtoupper($method) == $_SERVER['REQUEST_METHOD']);
    }

    /**
     * mediante $_REQUEST obtendremos los parámetros que nos manden por la url en forma de array asociativo
     * tambien convierte el array en un objeto
     *
     * @param boolean $castParamsToObject
     * @return void
     */
    public function getUrlParams($castParamsToObject = false)
    {
        return ($castParamsToObject) ? (object) $_REQUEST : $_REQUEST;
    }
    /**
     * Permite obtener lo HEADERS y lo encapsulamos
     * y lo convierte en un array asociativo
     *
     * @return void
     */
    public function getHeaders()
    {
        return getallheaders();
    }

    /**
     * @return mixed
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     */
    public function setUri(): void
    {
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params): void
    {
        $this->params = $params;
    }
}
