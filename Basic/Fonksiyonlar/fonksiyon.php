<?php

function merhabaDunya(){
    echo "Merhaba, Dünya!";
}

merhabaDunya();

function toplama($a, $b){
    $sonuc = $a + $b;
    echo "$a + $b = $sonuc";
}

toplama(5, 10);

function selamla($isim = "Misafir"){
    echo "Merhaba, $isim!";
}

selamla();
selamla("Ahmet");

function carpma($a,$b){
    return $a * $b;
}

$sonuc = carpma(4,5);
echo $sonuc;

function toplamaHepsi(){
    $toplam = 0;
    foreach(func_get_args() as $sayi){
        $toplam += $sayi;
    }
    return $toplam;
}

echo toplamaHepsi(1,2,3,4,5);

$carpma = function($a , $b){
    return $a * $b;
};

echo $carpma(3,4);
?>