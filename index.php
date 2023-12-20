<?php

declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use garden\Garden;

$garden = new Garden(3);
$countFruitOnTree = $garden->getCountFruitsOnTree();

$garden->passDay();
$garden->passDay();

echo 'Дней прошло:  ' . $garden->getPassedDays() . '<br>';
echo 'Количество яблонь в саду: ' . $garden->getCountTrees() . '<br>';

foreach ($countFruitOnTree as $treeNumber => $count) {
    echo "Количество яблок на дереве {$treeNumber}: {$count} <br>";
}

echo 'Всего яблок на всех деревьях: ' . array_sum($countFruitOnTree) . '<br>';
