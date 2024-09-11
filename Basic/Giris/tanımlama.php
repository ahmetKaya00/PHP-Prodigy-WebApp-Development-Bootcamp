<?php
        //Yorum Satırı
        echo "Merhaba Dünya!";
        /*
        Çoklu
        Yorum
        Satırı
        */
        $name = 'Ahmet';
        echo 'Merhaba $name';// String algılar
        echo "Merhaba $name";//Kaçır karakterlerini verir

        $number = 42;
        var_dump($number);

        $num1 = 10;
        $num2 = 3;

        $sum = $num1 + $num2;
        $sum = $num1 - $num2;
        $sum = $num1 * $num2;
        $sum = $num1 / $num2;

        echo $sum;

        define("SITE_NAME", "My WebSite");
        echo SITE_NAME
?>