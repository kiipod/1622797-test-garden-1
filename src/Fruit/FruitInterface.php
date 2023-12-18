<?php

namespace src\Fruit;

interface FruitInterface
{
    public function fall();

    public function spoil();

    public function isSpoiled();

    public function isFallen();

    public function getAge();

    public function getColor();

    public function getSize();
}
