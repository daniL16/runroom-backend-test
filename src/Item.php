<?php

declare(strict_types=1);

namespace Runroom\GildedRose;

abstract class Item
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var int
     */
    protected $sell_in;
    /**
     * @var int
     */
    protected $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return "$this->name, $this->sell_in, $this->quality";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellIn(): int
    {
        return $this->sell_in;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function sold(): void
    {
        if ('Sulfuras, Hand of Ragnaros' != $this->name) {
            --$this->sell_in;
        }
    }

    /**
     * @return void
     */
    public function processQuality()
    {
        if ($this->quality > 0 && 'Sulfuras, Hand of Ragnaros' != $this->name) {
            --$this->quality;
        }
    }

    abstract public function updateQualityNegativeSellIn(): void;
}
