<?php

declare(strict_types=1);

namespace garden\Tree;

use garden\Fruit\Apple;

class AppleTree implements TreeInterface
{
    private array $apples = [];

    public function __construct()
    {
        $numApples = rand(1, 100);
        for ($i = 0; $i < $numApples; $i++) {
            $this->apples[] = new Apple();
        }
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
     * Метод управляет яблоками на деревьях
     *
     * @return void
     */
    public function controlFruit(): void
    {
        $this->age += 1;

        $this->addNewAppleEvery30Days();

        foreach ($this->apples as $apple) {
            $this->processApple($apple);
        }
    }

    /**
     * Метод отвечает за создание новых яблок на дереве, через 30 дней
     *
     * @return void
     */
    private function addNewAppleEvery30Days(): void
    {
        if ($this->age % 30 === 0) {
            $this->addFruit();
        }
    }

    /**
     * Метод отвечает за процесс роста и старения яблока
     *
     * @param Apple $apple
     * @return void
     */
    private function processApple(Apple $apple): void
    {
        $apple->age += 1;

        if ($apple->age >= 30) {
            $this->handleAgedApple($apple);
        }

        $apple->spoilAfterFall();
    }

    /**
     * Метод отвечает за падение яблока
     *
     * @param Apple $apple
     * @return void
     */
    private function handleAgedApple(Apple $apple): void
    {
        $apple->fall();
        $apple->setFallenTimestamp(time());
    }

    /**
     * Метод подсчитывает сколько яблок осталось на дереве
     *
     * @return int
     */
    public function getCountFruit(): int
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
