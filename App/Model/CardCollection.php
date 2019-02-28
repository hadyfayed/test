<?php declare(strict_types=1);

namespace App\Model;

use MediSoft\Traits\Singleton;

class CardCollection
{
    use Singleton;

    const SUITS = [
        'H' => 'Hearts',
        'C' => 'Clubs',
        'S' => 'Spades',
        'D' => 'Diamonds',
    ];
    const RANKS = [
        '2' => 'Two',
        '3' => 'Three',
        '4' => 'Four',
        '5' => 'Five',
        '6' => 'Six',
        '7' => 'Seven',
        '8' => 'Eight',
        '9' => 'Nine',
        '10' => 'Ten',
        'J' => 'Jack',
        'Q' => 'Queen',
        'K' => 'King',
        'A' => 'Ace',
    ];

    /* @var \Tightenco\Collect\Support\Collection $collection */
    private $collection = [];

    public function createCollection()
    {
        $this->collection = collect();
        collect(self::SUITS)->each(function ($suitName, $suitCode) {
            collect(self::RANKS)->each(function ($rankName, $rankCode) use ($suitCode) {
                $this->collection->push($suitCode . $rankCode);
            });
        });
        return $this;
    }

    public function setCollection($collection)
    {
        $this->collection = collect($collection);
        return $this;
    }

    public function getCollection()
    {
        return collect($this->collection);
    }

    public function getCardStyle($card)
    {
        $breakDown = str_split($card);
        switch ($breakDown[0]) {
            case 'H':
                return ['color'=>'#FF0000','icon'=>'fa-heart','number'=> $breakDown[1]];
            case 'D':
                return ['color'=>'#FF0000','icon'=>'fa-diamond','number'=> $breakDown[1]];
                break;
            case 'C':
                return ['color'=>'#000000','icon'=>'fa-club','number'=> $breakDown[1]];
                break;
            case 'S':
                return ['color'=>'#000000','icon'=>'fa-spade','number'=> $breakDown[1]];
                break;
        }
    }

    public function drawCard()
    {
        return $this->collection->shift();
    }

    public function cardExists($card)
    {
        return $this->collection->containsStrict($card);
    }

    public function shuffle()
    {
        $this->collection = $this->collection->shuffle();
        return $this;
    }
}
