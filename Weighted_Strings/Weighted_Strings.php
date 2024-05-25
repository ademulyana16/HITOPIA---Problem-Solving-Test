<?php

function getCharacterWeight($char) {
    // Mengembalikan bobot dari sebuah karakter
    return ord($char) - ord('a') + 1;
}

function calculateWeights($string) {
    $weights = [];
    $length = strlen($string);
    $i = 0;

    while ($i < $length) {
        $char = $string[$i];
        $weight = getCharacterWeight($char);
        $weights[$weight] = true;

        $count = 1;
        // Loop untuk karakter berulang
        while ($i + 1 < $length && $string[$i + 1] == $char) {
            $i++;
            $count++;
            $weights[$weight * $count] = true;
        }

        $i++;
    }

    return $weights;
}

function weightedStringQueries($string, $queries) {
    // Hitung semua bobot dari karakter dan substring berulang
    $weights = calculateWeights($string);

    // Evaluasi setiap query
    $results = [];
    foreach ($queries as $query) {
        if (isset($weights[$query])) {
            $results[] = "Yes";
        } else {
            $results[] = "No";
        }
    }

    return $results;
}

// Contoh penggunaan
$string = "abbcccd";
$queries = [1, 3, 9, 8];

$results = weightedStringQueries($string, $queries);
print_r($results); // Output: Array ( [0] => Yes [1] => Yes [2] => Yes [3] => No )

?>
