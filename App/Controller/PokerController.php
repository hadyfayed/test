<?php declare(strict_types=1);

namespace App\Controller;

use App\Model\CardCollection;
use App\Model\Calculator;

class PokerController extends Controller
{
    public function getMethod()
    {
        return $this->view('poker', [
            'suits' => CardCollection::SUITS,
            'ranks' => CardCollection::RANKS,
        ]);
    }

    public function postDeck()
    {
        if ($this->postArgument('drawnCards') !== null) {
            $drawnCards = $this->postArgument('drawnCards');
        } else {
            $drawnCards = [];
        }

        if ($this->postArgument('draw') !== null) {
            $draw = $this->postArgument('draw');
        } else {
            $draw = '';
        }

        if ($this->postArgument('suit') !== null) {
            $suit = $this->postArgument('suit');
        } else {
            $suit = '';
        }

        if ($this->postArgument('rank') !== null) {
            $rank = $this->postArgument('rank');
        } else {
            $rank = '';
        }
        if ($this->postArgument('deck') !== null) {
            $deck = $this->postArgument('deck');
        } else {
            $deck = '';
        }

        $calculator = new Calculator();
        /* @var \App\Model\CardCollection $cardDeck*/
        $cardDeck = CardCollection::instance();
        $selectedCard = false;
        if (!$draw) {
            $cardDeck->createCollection();
            $cardDeck->shuffle();
        }
        if ($draw && is_array($deck)) {
            $cardDeck->setCollection($deck);
            $card = $cardDeck->drawCard();
            $drawnCards[] = $card;
            $selectedCard = ($card === $suit . $rank);
        }
        return $this->view('deck', [
            'suit' => $suit,
            'rank' => $rank,
            'suits' => CardCollection::SUITS,
            'ranks' => CardCollection::RANKS,
            'deck' => $cardDeck->getCollection(),
            'drawnCards' => $drawnCards,
            'selectedCard' => $selectedCard,
            'chance' => $calculator->getDrawnCardChance($cardDeck),
            'attemptNumber' => count($drawnCards),
        ]);
    }
}
