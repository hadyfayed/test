<?php declare(strict_types=1);

namespace App\Model;

use MediSoft\Traits\Singleton;
use phpDocumentor\Reflection\Types\This;
use Tightenco\Collect\Support\Collection;

class PhraseAnalyzer
{
    use Singleton;

    protected $phrase;

    /* @var Collection $phraseArray*/
    protected $phraseArray;

    protected $report;

    /**
     * @return mixed
     */
    public function getPhrase()
    {
        return $this->phrase;
    }

    /**
     * @param mixed $phrase
     * @throws \Exception
     */
    public function setPhrase($phrase)
    {
        if ($this->count($phrase) < 255) {
            $this->phrase = $phrase;
            $this->phraseArray = collect(str_split($this->phrase));
            $this->phraseArray = $this->phraseArray->forget($this->getKeys(' '));
        } else {
            return 'String Cannot Be More Than 255';
        }
        return $this;
    }

    public function count($string = null){
        if($string === null){
            return strlen($this->getPhrase());
        }
        return strlen($string);
    }

    public function getPhraseArray()
    {
        return $this->phraseArray;
    }

    public function setPhraseArray($array)
    {
        $this->phraseArray = $array;
        return $this;
    }

    public function Report(){
        $count = collect([]);
        $this->getPhraseArray()->each(function($value, $key) use ($count){
            $collectionContains = $count->filter(function ($value2, $key2) use ($value) {
                if($value2['value'] == $value) { return true;}
                return false;
            });
            if($collectionContains->isEmpty()){
                $count[$key] = [
                    'value' => $value,
                    'count' => 1,
                    'keys'=>[$key],
                    'before'=>[$this->getBefore([$key])],
                    'after'=>[$this->getAfter([$key])]
                ];
            }else{
                $val = $collectionContains->keys()->toArray();
                $endKey = $count[end($val)]['keys'];
                $rightEnd = end($endKey);
                if(abs(($key - 1) - $rightEnd) <= 10){
                    $count[end($val)] = [
                        'value' => $count[end($val)]['value'],
                        'count' => $count[end($val)]['count'] + 1,
                        'keys' => collect($count[end($val)]['keys'])->merge([$key])->toArray(),
                        'before' => collect($count[end($val)]['before'])->merge([$this->getBefore([$key])])->toArray(),
                        'after' => collect($count[end($val)]['after'])->merge([$this->getAfter([$key])])->toArray()
                    ];
                }
                else{
                    $count[$key] = [
                        'value' => $value,
                        'count' => 1,
                        'keys'=>[$key],
                        'before'=>[$this->getBefore([$key])],
                        'after'=>[$this->getAfter([$key])]
                    ];
                }
            }
        });
        return $count;
    }

    function getKeys( $value){
        return array_keys($this->getPhraseArray()->toArray(), $value);
    }

    function getBefore($keys){
        $list = [];
        foreach ($keys as $key){
            if( isset($this->getPhraseArray()->toArray()[$key + 1]) ){
                $list[] = $this->getPhraseArray()->toArray()[$key + 1];
            }
        }
        return (!empty(implode(",",$list)) ? implode(",",$list) : 'none');
    }

    function getAfter($keys){
        $list = [];
        foreach ($keys as $key){
            if( isset($this->getPhraseArray()->toArray()[$key - 1]) ){
                $list[] = $this->getPhraseArray()->toArray()[$key - 1];
            }
        }
        return (!empty(implode(",",$list)) ? implode(",",$list) : 'none');
    }
}
