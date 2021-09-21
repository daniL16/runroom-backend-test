<?php

namespace Runroom\GildedRose;

class AgedBrie extends Item
{

    public function __construct(int $sell_in, int $quality)
    {
        parent::__construct('Aged Brie', $sell_in, $quality);
    }

    public function processQuality(){
        if ($this->quality < 50) {
            $this->quality += 1;
        }
    }

    public function updateQualityNegativeSellIn(){
        if ($this->quality < 50) {
            $this->quality += 1;
        }
    }
}