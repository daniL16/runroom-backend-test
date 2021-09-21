<?php

declare(strict_types=1);

namespace Runroom\GildedRose;

final class GildedRose {

    private $items;

    function __construct(array $items) {
        $this->items = $items;
    }

    public function update_quality() {
        foreach ($this->items as $item) {
            $itemName = $item->getName();
            $item->processQuality();
            $item->sold();
            $this->updateQualityNegativeSellIn($item);
        }
    }

    /**
     * @param Item $item
     */
    private function updateQualityNegativeSellIn(Item $item){
        $itemType = (new \ReflectionClass($item))->getShortName();
        if ($item->getSellIn() < 0) {
            if(in_array($itemType,['AgedBrie','BackstagePasses'])){
                $item->updateQualityNegativeSellIn();
            }
            else{
                    $item->processQuality();
            }
        }
    }


}
