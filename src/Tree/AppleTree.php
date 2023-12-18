<?php

declare(strict_types=1);

namespace src\Tree;

use src\Fruit\Apple;

class AppleTree implements TreeInterface
{
    private array $apples = [];

    public function __construct()
    {
        $numApples = rand(1, 10);
        for ($i = 0; $i < $numApples; $i++) {
            $this->apples[] = new Apple();
        }
    }

    /**
     * Метод возвращается количество яблок на дереве
     *
     * @return array
     */
    public function getFruits(): array
    {
        return $this->apples;
    }

    /**
     * Метод добавляет яблоки на дерево
     *
     * @return void
     */
    public function addFruit(): void
    {
        $this->apples[] = new Apple();
    }

    /**
     * Метод управляет ростом и падением яблок на дереве
     *
     * @return void
     */
    public function passDay(): void
    {
        foreach ($this->apples as $apple) {
            $apple->age();

            if ($apple->getAge() == 30) {
                $apple->fall();
            }

            if ($apple->isFallen() && !$apple->isSpoiled()) {
                $apple->spoil();
            }
        }
    }

    /**
     * Метод подсчитывает сколько яблок осталось на дереве
     *
     * @return int
     */
    public function getCountApples(): int
    {
        $count = 0;
        foreach ($this->apples as $apple) {
            if (!$apple->isFallen()) {
                $count++;
            }
        }

        return $count;
    }
}
