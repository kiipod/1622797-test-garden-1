<?php

declare(strict_types=1);

namespace garden\Fruit;

interface FruitInterface
{
    public function fall(): bool;

    public function spoil(): bool;

    public function isSpoiled(): bool;

    public function isFallen(): bool;

    public function getAge(): int;

    public function getColor(): string;

    public function getSize(): int;
}
