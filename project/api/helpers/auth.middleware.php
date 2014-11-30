<?php

require_once __DIR__.'/../vendor/Slim/Middleware.php';
require_once __DIR__.'/../managers/contracts/token.manager.contract.php';

class AuthMiddleware extends \Slim\Middleware
{
    protected $tokenManager;
    protected $excludedUris = [];

    public function __construct(ItokenManager $mgr, array $validUris)
    {
      $this->excludedUris = $validUris;
      $this->tokenManager = $mgr;
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
      $requestUri = $request->getResourceUri();

      if (in_array($requestUri, $this->excludedUris) === false) {
        $token = $this->app->getCookie('auth_token');
        $authorized = $this->tokenManager->checkToken($token);
        if (!$authorized) {
          $this->app->response->status(401);          
        } else {
          $this->next->call();
        };
      } else {
        $this->next->call();
      }
      
    }
}
?>