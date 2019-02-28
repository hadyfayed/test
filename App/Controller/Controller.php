<?php declare(strict_types=1);

namespace App\Controller;

use League\Plates\Engine;
use League\Plates\Extension\Asset;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\ServerRequest;

/**
 * Class Controller
 * @package App\Core
 */
class Controller
{
    /** @var $request ServerRequestInterface */
    protected $request;
    /** @var $response ResponseInterface */
    protected $response;

    protected $postInput;
    protected $getInput;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->request = new ServerRequest();
        $this->response = new \Zend\Diactoros\Response;
        $this->getInput = $this->request->getQueryParams();
        $this->postInput = Request::getParsedBody();
    }

    protected function argument(string $name, $args)
    {
        if (empty($args) || $args === null) {
            return null;
        }
        return isset($args[$name]) ? $args[$name] : null;
    }

    protected function postArgument(string $name)
    {
        return $this->argument($name, $this->postInput);
    }

    protected function getArgument(string $name)
    {
        return $this->argument($name, $this->getInput);
    }

    /**
     * @param string $name
     * @param array $params
     * @return ResponseInterface
     */
    public function view(string $name, array $params = [])
    {
        $plates = new Engine(base_path('App'.DS.'View'));
        $plates->loadExtension(new Asset(base_path('public')));
        $render = $plates->render($name, $params);
        return $this->response($render);
    }

    /**
     * @param string $data
     * @param int $statusCode
     * @return ResponseInterface
     */
    public function response(string $data, int $statusCode = 200): ResponseInterface
    {
        $this->response->getBody()->write($data);
        return $this->response->withStatus($statusCode);
    }
}
