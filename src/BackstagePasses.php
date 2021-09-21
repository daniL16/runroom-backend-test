<?php

namespace Runroom\GildedRose;

class BackstagePasses extends Item
{

    public function processQuality()
    {
        if ($this->quality < 50) {
            $this->quality += 1;
            if ($this->sell_in < 11 && $this->quality < 50) {
                $qualityImprovement = $this->sell_in < 6 ? 2 : 1;
                $this->quality += $qualityImprovement;
            }
        }
    }

    public function updateQualityNegativeSellIn(){
        $this->quality = 0;
    }
}