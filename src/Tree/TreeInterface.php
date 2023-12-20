<?php

declare(strict_types=1);

namespace garden\Tree;

interface TreeInterface
{
    public function addFruit(): void;
    public function controlFruit(): void;
    public function getCountFruit(): int;
}
