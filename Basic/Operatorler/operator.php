<?php

    //Matematiksel

    $a = 10;
    $b = 3;

    echo $a + $b;
    echo $a - $b;
    echo $a * $b;
    echo $a / $b;

    //Atama Opertörleri
    
    $a += 5;
    echo "a += 5: $a\n";
    $a -= 5;
    echo "a -= 5: $a\n";
    $a *= 5;
    echo "a *= 5: $a\n";
    $a /= 5;
    echo "a /= 5: $a\n";

    //Karşılaştırma Operatörleri

    $x = "10";
    $y = 10;

    var_dump($x == $y); // Değerler eşit olmalı
    var_dump($x === $y); // Hem tür hem değer eşit olmalı
    var_dump($x < $y);

    //Mantıksal Operatörler

    $e = true;
    $r = false;

    var_dump($e && $r);
    var_dump($e || $r);
    var_dump(!$e);

    //Diğer Operatörler

    $a = "Merhaba";
    $b = "Dünya";
    $c = $a . " " . $b;
    echo $c;

    $x = 5;
    $x++;
    echo $x;

?>