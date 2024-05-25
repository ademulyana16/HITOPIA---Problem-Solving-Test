<?php

function highestPalindrome($s, $k, $l, $r) {
    // Basis: Jika l dan r sudah melewati satu sama lain
    if ($l > $r) {
        return $s;
    }
    
    // Jika karakter pada posisi l dan r sudah sama
    if ($s[$l] == $s[$r]) {
        return highestPalindrome($s, $k, $l + 1, $r - 1);
    }

    // Jika karakter pada posisi l dan r berbeda dan k sudah habis
    if ($k <= 0) {
        return "-1";
    }
    
    // Pilihan untuk mengganti karakter kiri atau kanan
    $option1 = substr_replace($s, $s[$r], $l, 1); // replace s[l] with s[r]
    $result1 = highestPalindrome($option1, $k - 1, $l + 1, $r - 1);
    
    $option2 = substr_replace($s, $s[$l], $r, 1); // replace s[r] with s[l]
    $result2 = highestPalindrome($option2, $k - 1, $l + 1, $r - 1);
    
    // Pilih hasil yang valid dan lebih besar
    if ($result1 == "-1" && $result2 == "-1") {
        return "-1";
    } elseif ($result1 == "-1") {
        return $result2;
    } elseif ($result2 == "-1") {
        return $result1;
    } else {
        return $result1 > $result2 ? $result1 : $result2;
    }
}

function makeHighestPalindrome($s, $k) {
    $n = strlen($s);
    $result = highestPalindrome($s, $k, 0, $n - 1);
    
    if ($result == "-1") {
        return -1;
    }
    
    // Setelah membuat palindrome, lakukan maksimum penggantian karakter untuk nilai tertinggi
    $result = maximizePalindrome($result, $k, 0, $n - 1);
    return $result;
}

function maximizePalindrome($s, $k, $l, $r) {
    // Basis: Jika l dan r sudah melewati satu sama lain
    if ($l > $r) {
        return $s;
    }
    
    // Jika karakter pada posisi l dan r sama dan kita masih punya penggantian
    if ($s[$l] == $s[$r]) {
        if ($s[$l] != '9' && $k >= 2) {
            $s[$l] = '9';
            $s[$r] = '9';
            $k -= 2;
        }
        return maximizePalindrome($s, $k, $l + 1, $r - 1);
    }

    // Jika karakter pada posisi l dan r berbeda dan k sudah habis
    if ($k <= 0) {
        return $s;
    }
    
    // Ganti kedua karakter menjadi '9' jika memungkinkan
    if ($k >= 2) {
        $s[$l] = '9';
        $s[$r] = '9';
        $k -= 2;
    } else {
        // Ganti salah satu karakter menjadi '9' jika memungkinkan
        if ($s[$l] > $s[$r]) {
            $s[$r] = $s[$l];
        } else {
            $s[$l] = $s[$r];
        }
        $k -= 1;
    }
    
    return maximizePalindrome($s, $k, $l + 1, $r - 1);
}

// Contoh penggunaan
echo makeHighestPalindrome("3943", 1); // Output: 3993
echo makeHighestPalindrome("932239", 2); // Output: 992299

?>
