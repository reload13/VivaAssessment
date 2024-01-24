<?php

declare(strict_types=1);

namespace Library;

use ReflectionMethod;
//use App\Exceptions\PageNotFoundException;
use Exception;
use UnexpectedValueException;

class Dispatcher
{

    private $auth;
    public function __construct(private Router $router,
                                private Container $container,
                                array $auth
                                )
    {
        $this->auth = $auth;
    }

    public function handle(Request $request): Response
    {

        // Check authentication routing
        $requiresAuthentication = $this->routeRequiresAuthentication($request,$this->auth);

        if (!$requiresAuthentication) {

            header('Location: /users/login');
            exit();

        }

        $path = $this->getPath($request->uri);
        $params = $this->router->match($path, $request->method);

        if ($params === false) {

            throw new Exception("No route matched for '$path' with method '{$request->method}'");

        }

        $action = $this->getActionName($params);
        $controller = $this->getControllerName($params);

        $controller_object = $this->container->get($controller);

        $controller_object->setViewer($this->container->get(TemplateInterface::class));

        $controller_object->setResponse($this->container->get(Response::class));

        $args = $this->getActionArguments($controller, $action, $params);

        $controller_handler = new ControllerRequestHandler($controller_object,
            $action,
            $args);

        return $controller_handler->handle($request);
    }


    private function getActionArguments(string $controller, string $action, array $params): array
    {
        $args = [];

        $method = new ReflectionMethod($controller, $action);

        foreach ($method->getParameters() as $parameter) {

            $name = $parameter->getName();

            $args[$name] = $params[$name];

        }

        return $args;
    }

    private function getControllerName(array $params): string
    {
        $controller = $params["controller"];

        $controller = str_replace("-", "", ucwords(strtolower($controller), "-"));

        $namespace = "Main\\Controllers";

        if (array_key_exists("namespace", $params)) {

            $namespace .= "\\" . $params["namespace"];

        }

        return $namespace . "\\" . $controller;
    }

    private function getActionName(array $params): string
    {
        $action = $params["action"];

        $action = lcfirst(str_replace("-", "", ucwords(strtolower($action), "-")));

        return $action;
    }

    private function getPath(string $uri): string
    {
        $path = parse_url($uri, PHP_URL_PATH);

        if ($path === false) {

            throw new UnexpectedValueException("Malformed URL: '$uri'");

        }

        return $path;
    }

    private function routeRequiresAuthentication(Request $request, array $auth): bool
    {
        $path = $this->getPath($request->uri);
        $params = $this->router->match($path, $request->method);

        if($request->method == "POST"){
            return true; // Post routes not included
        }

        if ($params === false) {
            return false; // Route not found, handle accordingly
        }

        if (in_array($path, $auth['public'])) {
            return true; // No authentication required for public routes
        }


        // Check if the route requires authentication based on your logic
        foreach ($auth['authenticated'] as $routePattern => $requiredRoles) {
            if (preg_match("#^$routePattern$#", $path)) {
                // Check if the user has any of the required roles for the matched route
                foreach ($requiredRoles as $role) {
                    if (!empty($_SESSION['roles']) && in_array($role, explode(",",$_SESSION['roles']))) {
                        return true; // User has one of the required roles, authentication is required
                    }
                }
            }
        }


        return false;
    }
}