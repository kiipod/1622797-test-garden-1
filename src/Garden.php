<?php

declare(strict_types=1);

namespace src;

use src\Tree\AppleTree;

class Garden
{
    private array $trees = [];
    private int $age = 0;

    /**
     * Конструктор на входе принимает сколько деревьев нужно создать
     *
     * @param $numTrees
     */
    public function __construct($numTrees)
    {
        for ($i = 0; $i < $numTrees; $i++) {
            $this->trees[] = new AppleTree();
        }
    }

    /**
     * Метод отвечает за просчет времени жизни сада
     *
     * @return void
     */
    public function passDay(): void
    {
        $this->age++;

        foreach ($this->trees as $tree) {
            $tree->passDay();
        }
    }

    /**
     * Метод отвечает за просчет количество плодов на всех деревьях
     *
     * @return int
     */
    public function getCountFruits(): int
    {
        $count = 0;
        foreach ($this->trees as $tree) {
            $count += $tree->getCountApples();
        }

        return $count;
    }
}
