<?php declare(strict_types=1);

use App\Model\CardCollection;
use App\Model\Calculator;
use PHPUnit\Framework\TestCase;

class PokerTest extends TestCase{

    /* @var CardCollection $cardCollection*/
    private $cardCollection;
    /* @var \Tightenco\Collect\Support\Collection $collection */
    private $collection;

    /**
     * @test
     * @return void
     */
    public function setUp() : void{
        $this->cardCollection = new CardCollection();
        $this->cardCollection->createCollection();
        $this->collection = $this->cardCollection->getCollection();
        $this->assertTrue(true);
    }

    /**
     * @test
     * @return void
     */
    public function testCreateDeck(){
        $cards = array();
        foreach ($this->cardCollection::SUITS as $key => $suit) {
            foreach ($this->cardCollection::RANKS as $key2 => $rank) {
                $cards[] = $key.$key2;

            }
        }
        $this->assertTrue($this->collection->toArray() == $cards);
    }

    /**
     * @test
     * @return void
     */
    public function testCalculator(){
        $this->collection = $this->collection->shuffle();
        $calculator = new Calculator();
        $chance = $calculator->getDrawnCardChance($this->cardCollection);
        $this->assertTrue($chance == '0');
    }

    public function testDraw(){
        $this->collection = $this->collection->shuffle();
        $this->collection->shift();
        $this->collection->shift();
        $this->cardCollection->setCollection($this->collection);
        $this->assertTrue($this->collection->count() == 50);
    }

    public function testCalculatorAfterDraw(){
        $this->collection = $this->collection->shuffle();
        $this->collection->shift();
        $this->collection->shift();
        $this->cardCollection->setCollection($this->collection);
        $calculator = new Calculator();
        $chance = $calculator->getDrawnCardChance($this->cardCollection);
        $this->assertTrue($chance == '3.85');
    }
}
