<?php

function isBalanced($s) {
    $stack = [];
    $bracketMap = [
        ')' => '(',
        '}' => '{',
        ']' => '['
    ];

    for ($i = 0; $i < strlen($s); $i++) {
        $char = $s[$i];

        // Jika karakter adalah bracket penutup
        if (isset($bracketMap[$char])) {
            $topElement = empty($stack) ? '#' : array_pop($stack);

            // Jika top element dari stack tidak cocok dengan bracket penutup
            if ($topElement != $bracketMap[$char]) {
                return "NO";
            }
        } else if ($char == '(' || $char == '{' || $char == '[') {
            // Jika karakter adalah bracket pembuka
            array_push($stack, $char);
        }
    }

    return empty($stack) ? "YES" : "NO";
}

// Contoh penggunaan
echo isBalanced("{[()]}") . "\n"; // Output: YES
echo isBalanced("{[(])}") . "\n"; // Output: NO
echo isBalanced("{(([])[[]])[]}") . "\n"; // Output: YES

?>
