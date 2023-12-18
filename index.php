<?php

use src\Garden;

$garden = new Garden(3);

$garden->passDay();
$garden->passDay();
$garden->passDay();

echo "Count of apples: " . $garden->getCountFruits();
