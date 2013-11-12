<?php
class router
{
    private $routes;

    public function __construct($routes) {
        // Default routes
        $this->routes = ["" => "home"];

        // Insert new routes before default routes.
        array_splice($this->routes, 0, 0, $routes);
    }

    public function dispatch($path) {
        // echo "path=" . $path;

        $pattern = "/^\/(?<controller>\w+)\/(?<action>\w+)\??(?<params>.*)/";
        if(preg_match($pattern, $path, $matches)) {
            //var_dump($matches);
            $controller = $matches["controller"];
            $action = $matches["action"];
            //print_r($matches["params"]);

            // initialize controller according to results.
            $controller_file = 'controller/' . $controller . '.php';
            require $controller_file;
            $reflector = new ReflectionClass($controller . '_controller');
            $obj = $reflector->newInstance();
            $method = $reflector->getMethod($action);
            $method->invoke($obj);
        }
        else {
            echo "Parse fail.";
        }
    }
}
return new router();
?>
