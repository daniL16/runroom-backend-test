<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;

    function __construct(array $items) {
        $this->items = $items;
    }

    public function update_quality() {
        foreach ($this->items as $item) {
            $itemName = $item->getName();
            if ($itemName != 'Aged Brie' and $itemName != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->getQuality() > 0) {
                    if ($itemName != 'Sulfuras, Hand of Ragnaros') {
                        $item->setQuality($item->getQuality() - 1);

                    }
                }
            }
            else {
                if ($item->getQuality() < 50) {
                    $item->setQuality($item->getQuality() + 1);
                    if ($itemName == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->getSellIn() < 11) {
                            if ($item->getQuality() < 50) {
                                $item->setQuality($item->getQuality() + 1);
                            }
                        }
                        if ($item->getSellIn() < 6) {
                            if ($item->getQuality() < 50) {
                                $item->setQuality($item->getQuality() + 1);
                            }
                        }
                    }
                }
            }

            $this->setSellIn($item);
            $this->updateQualityNegativeSellIn($item);

        }
    }

    /**
     * @param Item $item
     */
    private function updateQualityNegativeSellIn(Item $item){
        if ($item->getSellIn() < 0) {
            $itemName = $item->getName();
            if ($itemName != 'Aged Brie') {
                if ($itemName != 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->getQuality() > 0) {
                        if ($itemName != 'Sulfuras, Hand of Ragnaros') {
                            $item->setQuality( $item->getQuality() - 1);
                        }
                    }
                }
                else {
                    $item->setQuality( 0);
                }
            }
            else {
                if ($item->getQuality() < 50) {
                    $item->setQuality($item->getQuality() + 1);
                }
            }
        }
    }

    /**
     * @param Item $item
     */
    private function setSellIn(Item $item){
        if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
            $item->setSellIn( $item->getSellIn() - 1);
        }
    }

}
