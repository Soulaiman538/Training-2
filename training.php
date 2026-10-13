
<?php

// Maak een array met 10.000 random getallen
$nummers = [];

for ($i = 0; $i < 10000; $i++) {
    $nummers[] = rand(1, 100000);
}

// Sorteer van laag naar hoog
sort($nummers);

// Kies het laatste getal als target
$target = $nummers[count($nummers) - 1];

echo "We zoeken naar: $target\n\n";

// Functie voor lineair zoeken
function linearSearch($array, $target) {
    foreach ($array as $getal) {
        if ($getal == $target) {
            return true;
        }
    }

    return false;
}

// Functie voor binair zoeken
function binarySearch($array, $target) {
    $low = 0;
    $high = count($array) - 1;

    while ($low <= $high) {
        $mid = (int)(($low + $high) / 2);

        if ($array[$mid] == $target) {
            return true;
        }
        elseif ($array[$mid] > $target) {
            $high = $mid - 1;
        }
        else {
            $low = $mid + 1;
        }
    }

    return false;
}

// linear zoeken
$start = microtime(true);

$resultaat1 = linearSearch($nummers, $target);

$eind = microtime(true);

$tijd1 = ($eind - $start) * 1000;

echo "Lineair zoeken:\n";
echo "Gevonden: " . ($resultaat1 ? "Ja" : "Nee") . "\n";
echo "Tijd: $tijd1 ms\n\n";

// BINAIR ZOEKEN
$start = microtime(true);

$resultaat2 = binarySearch($nummers, $target);

$eind = microtime(true);

$tijd2 = ($eind - $start) * 1000;

echo "Binair zoeken:\n";
echo "Gevonden: " . ($resultaat2 ? "Ja" : "Nee") . "\n";
echo "Tijd: $tijd2 ms\n";

?>
