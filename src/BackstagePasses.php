<?php

declare(strict_types=1);

namespace Runroom\GildedRose;

final class BackstagePasses extends Item
{
    /**
     * @return void
     */
    public function processQuality()
    {
        if ($this->quality < 50) {
            ++$this->quality;
            if ($this->sell_in < 11 && $this->quality < 50) {
                $qualityImprovement = $this->sell_in < 6 ? 2 : 1;
                $this->quality += $qualityImprovement;
            }
        }
    }

    public function updateQualityNegativeSellIn(): void
    {
        $this->quality = 0;
    }
}
