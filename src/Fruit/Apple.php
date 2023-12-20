<?php

declare(strict_types=1);

namespace garden\Fruit;

class Apple implements FruitInterface
{
    private const ONE_DAY = 24 * 60 * 60;
    public int $age;
    private string $color;
    private int $size;
    private bool $spoiled;
    private bool $fallen;
    private int $fallenTimestamp;

    public function __construct()
    {
        $this->age = rand(0, 30);
        $this->color = $this->generateRandomColor();
        $this->size = rand(1, 5);
        $this->spoiled = false;
        $this->fallen = false;
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
     * @return bool
     */
    public function fall(): bool
    {
        return $this->fallen = true;
    }

    /**
     * Метод устанавливает значение яблока на упавшее
     *
     * @return bool
     */
    public function spoil(): bool
    {
        return $this->spoiled = true;
    }

    /**
     * Метод возвращает значение яблок как испортившееся
     *
     * @return bool
     */
    public function isSpoiled(): bool
    {
        return $this->spoiled;
    }

    /**
     * Метод возвращает значение яблок как упавшее
     *
     * @return bool
     */
    public function isFallen(): bool
    {
        return $this->fallen;
    }

    /**
     * Метод устанавливает день когда яблоко упало
     *
     * @param int $timestamp
     * @return void
     */
    public function setFallenTimestamp(int $timestamp): void
    {
        $this->fallenTimestamp = $timestamp;
    }

    /**
     * Метод портит яблоко после прохождения суток
     *
     * @return void
     */
    public function spoilAfterFall(): void
    {
        if ($this->fallen &&
            (time() - $this->fallenTimestamp) >= self::ONE_DAY) {
            $this->spoiled = true;
        }
    }

    /**
     * Метод возвращает возраст яблока
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
