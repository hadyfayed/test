<?php declare(strict_types=1);

namespace App\Controller;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends Controller
{

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getMethod()
    {
        return $this->view('home');
    }
}
