<?php
$number = 5;

if($number > 5){
    echo "$number 5'ten büyüktür";
}elseif($number == 5){
    echo "$number 5'e eşittir";
}
else{
    echo "$number 5'ten küçüktür";
}

$day = "Cumartesi";

    switch($day){
        case "Pazartesi":
            echo "Bugün Pazartesi";
            break;
        case "Cuma":
            echo "Bugün Cuma";
            break;
        default:
            echo "Bugün haftasonu";
            break;
    }

$age = 20;
    $result = ($age >=18) ? "Yekişkin" : "Çocuk";
    echo $result;

$username = $_GET['user'] ?? "Misafir";
echo "Merhaba, $username";
?>