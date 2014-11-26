<?php

require_once '../vendor/Slim/Middleware.php';
require_once 'Auth.php';

class AuthMiddleware extends \Slim\Middleware
{
    public $auth;
    protected $excludedUris = []

    public function __construct(array $validUris)
    {
      $this->excludedUris = $validUris;
      $this->auth = new Auth();      
    }

    /**
     * Call
     *
     * This method will check the HTTP request headers for previous authentication. If
     * the request has already authenticated, the next middleware is called. Otherwise,
     * a 401 Authentication Required response is returned to the client.
     */
    public function call()
    {
      $request = $this->app->request;
      $response = $this->app->response;

      //si intenta acceder al login, no valido para que pueda pedir token
      if (substr($request->getResourceUri(), 0, 6) !== '/login' && substr($request->getResourceUri(), 0, 9) !== '/register') {
        $ok = $this->auth->authentificate($this->app->getCookie('ACCESS_TOKEN'));
        if (!$ok) {
          $response->status(401);
          $response->write($request->getResourceUri());                  } else {
            $this->next->call();
        };
      } else {
        $this->next->call();
      };
    }
}
?>