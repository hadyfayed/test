<?php

namespace App\Model;

use MediSoft\Traits\Singleton;

/**
 * Class Calculator
 * @package App\Model
 */
class Calculator
{
    use Singleton;
    /**
     * @param CardCollection $cardDeck
     * @return float|int
     */
    public function getDrawnCardChance(CardCollection $cardDeck)
    {
        if (!count($cardDeck->getCollection())) {
            return 100;
        }
        $count = 53 - count($cardDeck->getCollection());
        $percent = $count/52;
        return round($percent * 100, 2, PHP_ROUND_HALF_DOWN);
    }
}
