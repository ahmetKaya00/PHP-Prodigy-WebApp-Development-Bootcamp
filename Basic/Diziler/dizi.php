<?php

//Dizi Tanımlama

$numericArray = array(10,20,30,40);
$shortNumericArray = [10,20,30,40];

$multiArray = array(
    array(1,2,3),
    array(4,5,6),
    array(7,8,9)
);

$assoscArray = array(
    "isim" => "Ahmet",
    "yas" => 37,
    "sehir" => "Mersin"
);

//Diziye eleman ekleme

$fruit = ["Elma","Armut"];
$fruit[] = "Muz";//Dizinin sonuna eleman ekler
array_push($fruit, "Çilek");//Dizinin sonuna eleman ekler

$assocArray = [
    "isim" => "Ahmet",
    "yas" => 37
];

$assocArray["sehir"] = "İstanbul";

//echo $fruit;  Dizi içeriği doğrudan görülmez
//print_r($fruit); // Dizi içindeki elemanları görmek için

//Diziden Elaman Çıkarma

$numbers = [10,20,30,40];
/*
print_r($numbers);
unset($numbers[2]); // İndis ile eleman çıkarma
print_r($numbers);
array_pop($numbers);//Son elemanı çıkarmak
print_r($numbers);
array_shift($numbers);//İlk elemanı çıkartmak
print_r($numbers);
*/

echo "Eleman sayısı: " . count($numbers) . "\n"; // eleman sayısınu bulmak
$moreNumbers = [50,60,70];
$mergedArray = array_merge($numbers, $moreNumbers);// İki diziyi birleştir
print_r($mergedArray);

$key = array_search(10, $numbers); //Dizide değerini arar ve anahtarı döner;
echo "10'ün anahtarı: $key \n";

$isInArray = in_array(30, $numbers);//dizide var mı yok mu ?
echo "4 dizide var mı ? " . ($isInArray ? "Evet" : "Hayır") . "\n";

sort($numbers); // Küçükten büyüğe sıralama
print_r($numbers);

rsort($numbers); // Büyükten küçüğe
print_r($numbers);
?>