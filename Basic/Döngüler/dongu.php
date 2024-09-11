<?php

    //While Döngüsü
    $i = 6;
    while($i <= 5){
        echo "Değer: $i\n";
        $i++;
    }

    //do...while
    $i = 6;
    do {
        echo "Değer: $i\n";
        $i++;
    }
    while($i<=5);

    //For Döngüsü

    for($i = 1; $i<=5; $i++){
        echo "Değer: $i\n";
    }

    //foreach Döngüsü

    $fruits = ["Elma","Armut","Muz"];
    foreach($fruits as $fruit){
        echo "Meyve:  $fruit\n";
    }

    //break continue

    //Break

    for($i = 1; $i <= 5; $i++){
        if($i == 3){
            break; // Döngü tamamen sonlandı
        }
        echo "Değer: $i\n";
    }

    //Contunie
    for($i = 1; $i <= 5; $i++){
        if($i == 3){
            continue; // İterasyonu atladı devam etti
        }
        echo "Değer: $i\n";
    }



?>