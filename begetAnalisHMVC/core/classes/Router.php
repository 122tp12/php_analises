<?php
class Route
{
    private $components = [];
    private $controller_name = NULL, $action_name = NULL, $params = [];
    const PARAM_PATTERN = "/\<([a-z0-9]+)\>\??/i";
    const PARAM_TMP_PATTERN = "/\<([a-z0-9]+)\>\?/i";

    public function __construct($route, array $params)
    {
        $this->components = explode("/", $route);
        $this->controller_name = @$params["controller"];
        $this->action_name = @$params["action"];
        $this->params = $params;
    }
    private function isTempParam($name)
    {
        return preg_match(self::PARAM_TMP_PATTERN, $name);
    }
    private function isParam($param, $value)
    {
        if (!preg_match(self::PARAM_PATTERN, $param, $arr)) return false;
        $name = $arr[1];
        if ($name == "controller") {
            $this->controller_name = $value;
        } else if ($name == "action") {
            $this->action_name = $value;
        } else {
            $this->params[$name] = $value;
        }
        return true;
    }
    public function exec($realrouteparams)
    {
        $count = max(count($realrouteparams), count($this->components));
        for ($i = 0; $i < $count; $i++) {
            if (!$this->components[$i]) return false;
            if (empty($realrouteparams[$i]) && $this->isTempParam($this->components[$i])) return true;
            elseif (empty($realrouteparams[$i])) return false;
            if ($this->isParam($this->components[$i], $realrouteparams[$i])) continue;
            if ($this->components[$i] != $realrouteparams[$i]) return false;
        }
        return true;
    }

    public function getData()
    {
        if ($this->controller_name === NULL || $this->action_name === NULL) throw new RoutExeption("Invalid Route", 404);
        return [
            "controller" => $this->controller_name,
            "action" => $this->action_name,
            "params" => $this->params
        ];
    }
}

class Router
{
    const DEFAULT_CONTROLLER = "main";
    const DEFAULT_ACTION = "index";
    private static $routes = [];
    private static $params = [];
    private static $URL_APP = NULL;

    private static function parseURI()
    {
        if (self::$URL_APP != NULL) return;
        $uri = explode("?", $_SERVER['REQUEST_URI'])[0];
        $components = explode("/", $uri);
        $degree = count(explode("/", URLROOT));
        self::$URL_APP = array_slice($components, $degree);

    }

    public static function getUriParam($n)
    {
        self::parseURI();
        if (is_integer($n)) {
            return @self::$URL_APP[$n];
        } else {
            return @self::$params[$n];
        }

    }

    public static function Load($controller, $action = self::DEFAULT_ACTION)
    {
        $controller = ucfirst(strtolower($controller)) . "Controller";
        $action = "action_" . ucfirst($action);
        $controller_path = CONTROLLERS_PATH . $controller . ".php";
        if (!file_exists($controller_path)) throw new RoutExeption("Controller not Found", 404);

        include $controller_path;
        $cdrl = new $controller();
        if (!method_exists($cdrl, $action)) throw new RoutExeption("Action not found", 404);
        $cdrl->$action();
        echo $cdrl->getResponce(true);

    }

    private static function defaultRun()
    {
        $controller = self::getUriParam(0);
        $action = self::getUriParam(1);
        $controller = $controller ? $controller : self::DEFAULT_CONTROLLER;
        $action = $action ? $action : self::DEFAULT_ACTION;

        self::Load($controller, $action);
    }

    private static function routeRun(Route $route)
    {
        $data = $route->getData();
        self::$params = $data["params"];
        self::Load($data["controller"], $data["action"]);
    }

    public static function Run()
    {
        self::parseURI();
        foreach (self::$routes as $route) {
            if ($route->exec(self::$URL_APP)) {
                self::routeRun($route);
                return;
            }
        }
        self::defaultRun();
    }

    public static function add($route, array $params)
    {
        self::$routes[] = new Route($route, $params);
    }
}