Kompleksitas

    Waktu: O(n), karena kita mengiterasi setiap karakter dalam string satu kali.
    Ruang: O(n), karena dalam kasus terburuk kita mungkin menyimpan semua karakter pembuka dalam stack.
    Balanced Bracket Checker

Fungsi isBalanced mengevaluasi apakah string yang mengandung bracket seimbang atau tidak. Bracket yang valid adalah (), {}, dan [].
Kompleksitas

    Waktu: O(n)
        Fungsi mengiterasi setiap karakter dalam string satu kali.
    Ruang: O(n)
        Stack dapat menyimpan hingga n/2 karakter dalam kasus terburuk (semua karakter pembuka).

Penjelasan

    Fungsi menggunakan struktur data stack untuk melacak bracket yang belum dipasangkan.
    Setiap kali karakter bracket pembuka ditemukan, karakter tersebut ditambahkan ke stack.
    Setiap kali karakter bracket penutup ditemukan, fungsi memeriksa apakah karakter pada puncak stack cocok dengan pasangan bracket pembuka yang sesuai.
    Jika semua bracket cocok dan stack kosong di akhir, string adalah seimbang.

    Berikut adalah beberapa contoh penggunaan fungsi:
    echo isBalanced("{[()]}") . "\n"; // Output: YES
    echo isBalanced("{[(])}") . "\n"; // Output: NO
    echo isBalanced("{(([])[[]])[]}") . "\n"; // Output: YES
