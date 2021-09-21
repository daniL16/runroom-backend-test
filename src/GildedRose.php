<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;

    function __construct(array $items) {
        $this->items = $items;
    }

    function update_quality() {
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

            if ($itemName != 'Sulfuras, Hand of Ragnaros') {
                $item->setSellIn( $item->getSellIn() - 1);
            }

            if ($item->getSellIn() < 0) {

                if ($itemName != 'Aged Brie') {
                    if ($itemName != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->getQuality() > 0) {
                            if ($itemName != 'Sulfuras, Hand of Ragnaros') {
                                $item->setQuality( $item->getQuality() - 1);
                            }
                        }
                    } else {
                        $item->setQuality( $item->getQuality() - $item->getQuality());
                    }
                } else {
                    if ($item->getQuality() < 50) {
                        $item->setQuality($item->getQuality() + 1);
                    }
                }
            }
        }
    }
}
