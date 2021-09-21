<?php

declare(strict_types=1);

namespace Runroom\GildedRose;

abstract class Item {

    protected $name;
    protected $sell_in;
    protected $quality;

    function __construct(string $name, int $sell_in, int $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString() : string {
        return "$this->name, $this->sell_in, $this->quality";
    }

    public function getName(): string{
        return $this->name;
    }

    public function getSellIn(): int{
        return $this->sell_in;
    }

    public function getQuality(): int{
        return $this->quality;
    }

    public function setQuality(int $quality): void{
        $this->quality = $quality;
    }

    public function setSellIn(int $sell_in): void{
        $this->sell_in = $sell_in;
    }

    public function sold(): void{
        if ($this->name != 'Sulfuras, Hand of Ragnaros') {
            $this->sell_in -= 1;
        }
    }

    public function processQuality()
    {
        if ($this->quality > 0 && $this->name != 'Sulfuras, Hand of Ragnaros') {
            $this->quality -= 1;
        }
    }

    abstract function updateQualityNegativeSellIn();
}
