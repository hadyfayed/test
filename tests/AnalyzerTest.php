<?php

use PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase{

    protected $analyzer;

    public function setUp() : void{
        $string = 'football vs soccer';
        $this->analyzer = new \App\Model\PhraseAnalyzer();
        $this->analyzer->setPhrase($string);
        $this->assertTrue(true);
    }

    public function testReport()
    {
        $string = 'football vs soccer';
        $this->analyzer = new \App\Model\PhraseAnalyzer();
        $this->analyzer->setPhrase($string);
        $this->assertTrue(is_array($this->analyzer->Report()->toArray()));
    }
}
