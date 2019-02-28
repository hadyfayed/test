<?php declare(strict_types=1);

namespace App\Controller;

use App\Model\PhraseAnalyzer;

/**
 * Class AnalyzerController
 * @package App\Controller
 */
class AnalyzerController extends Controller
{

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function getMethod()
    {
        return $this->view('analyzer');
    }

    public function postMethod()
    {
        $phrase = $this->postArgument('phrase');
        $analyzer = new PhraseAnalyzer();
        if(is_string($analyzer->setPhrase($phrase))){
            return $this->view('analyzer',['error'=>$analyzer->setPhrase($phrase), 'phrase'=>$phrase]);
        }
        return $this->view('analyzer',['report'=>$analyzer->Report(), 'phrase'=>$phrase]);
    }
}
