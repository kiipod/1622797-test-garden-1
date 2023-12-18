<?php

declare(strict_types=1);

namespace src\Fruit;

class Apple implements FruitInterface
{
    private int $age;
    private string $color;
    private int $size;
    private int $spoiled;
    private int $fallen;

    public function __construct()
    {
        $this->age = rand(0, 30);
        $this->color = $this->generateRandomColor();
        $this->size = rand(1, 5);
        $this->spoiled = 0;
        $this->fallen = 0;
    }

    /**
     * Метод отвечает за выбор цвета яблока
     *
     * @return string
     */
    private function generateRandomColor(): string
    {
        $colors = ['red', 'green', 'yellow'];
        return $colors[array_rand($colors)];
    }

    /**
     * Метод устанавливает значение яблока на испортившееся
     *
     * @return void
     */
    public function fall(): void
    {
        $this->fallen = 1;
    }

    /**
     * Метод устанавливает значение яблока на упавшее
     *
     * @return void
     */
    public function spoil(): void
    {
        $this->spoiled = 1;
    }

    /**
     * Метод возвращает значение яблок как испортившееся
     *
     * @return int
     */
    public function isSpoiled(): int
    {
        return $this->spoiled;
    }

    /**
     * Метод возвращает значение яблок как упавшее
     *
     * @return int
     */
    public function isFallen(): int
    {
        return $this->fallen;
    }

    /**
     * Метод возвращает возраст яблок
     *
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * Метод возвращает цвета яблок
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Метод возвращает размер яблок
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }
}
