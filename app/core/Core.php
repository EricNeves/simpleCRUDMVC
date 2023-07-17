<?php

class Core
{
  private $routes;

  public function __construct($routes)
  {
    $this->setRoutes($routes);
  }

  public function run()
  {
    $url = '/';

    isset($_GET['url']) ? $url .= $_GET['url'] : '';

    ($url != '/') ? $url = rtrim($url, '/') : $url;

    $routerFound = false;

    foreach ($this->getRoutes() as $path => $controllerAndAction) {
      $pattern = '#^' . preg_replace('/{id}/', '([\w-]+|\d+)', $path) . '$#';

      if (preg_match($pattern, $url, $matches)) {
        array_shift($matches);

        $routerFound = true;

        [$currentController, $action] = explode('@', $controllerAndAction);

        require_once __DIR__."/../controllers/$currentController.php";

        $controller = new $currentController();
        $controller->$action($matches);
      }
    }

    if (!$routerFound) {
      require_once __DIR__."/../controllers/NotFoundController.php";
      $controller = new NotFoundController();
      $controller->index();
    }
  }

  protected function getRoutes()
  {
    return $this->routes;
  }
  protected function setRoutes($routes)
  {
    $this->routes = $routes;
  }
}