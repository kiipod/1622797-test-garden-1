<?php

declare(strict_types=1);

namespace garden;

use garden\Tree\AppleTree;
use garden\Tree\TreeInterface;

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
     * Метод отвечает за прохождение суток жизни сада
     *
     * @return void
     */
    public function passDay(): void
    {
        $this->age++;

        foreach ($this->trees as $tree) {
            $tree->controlFruit();
        }
    }

    /**
     * Метод отвечает за подсчет пройденных дней
     *
     * @return int
     */
    public function getPassedDays(): int
    {
        return $this->age;
    }

    /**
     * Метод отвечает за добавление дерева в сад
     *
     * @param TreeInterface $tree
     * @return void
     */
    public function addTree(TreeInterface $tree): void
    {
        $this->trees[] = $tree;
    }

    /**
     * Метод отвечает за просчет количества деревьев в саду
     *
     * @return int
     */
    public function getCountTrees(): int
    {
        return count($this->trees);
    }

    /**
     * Метод отвечает за просчет количество яблок на одном дереве
     *
     * @return array
     */
    public function getCountFruitsOnTree(): array
    {
        $countFruitOnTree = [];

        foreach ($this->trees as $index => $tree) {
            $countFruitOnTree[$index + 1] = $tree->getCountFruit();
        }

        return $countFruitOnTree;
    }
}
