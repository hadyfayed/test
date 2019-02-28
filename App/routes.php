<?php declare(strict_types=1);

Router::get('poker', 'App\Controller\PokerController::getMethod')->setName('PokerIndex');
Router::post('poker', 'App\Controller\PokerController::postDeck');
Router::get('analyze', 'App\Controller\AnalyzerController::getMethod')->setName('AnalyzerIndex');
Router::post('analyze', 'App\Controller\AnalyzerController::postMethod');
Router::get('/', 'App\Controller\HomeController::getMethod')->setName('Home');
