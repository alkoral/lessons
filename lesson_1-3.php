<?php

// Задание 1: Составить массив, ключами в котором будут названия континентов,
// значениями — массивы из латинских названий зверей.
// Решение: Создаем двумерный массив

$continents=[
    "Africa"=> array("Giraffa camelopardalis", "Loxodonta africana", "Equus zebra zebra", "Panthera leo", "Pan troglodytes troglodytes", "Graphiurus crassicaudatus", "Gazella gazella", "Hippopotamus amphibius", "Bufotes viridis", "Pleurodeles waltl", "Dendroaspis polylepis", "Testudo kleinmanni", "Varanus", "Phoenicopterus roseus", "Crocodylus niloticus"),
    "Asia" => array("Dryomys nitedula", "Tamias sibiricus", "Lagurus lagurus", "Talpa altaica"),
    "Australia" => array("Macropus", "Arctocephalus pusillus", "Rattus lutreolus", "Chelodina longicollis", "Canis lupus dingo"),
    "Europe" => array("Meles meles", "Spermophilus pygmaeus", "Ursus arctos", "Pipistrellus pipistrellus"),
    "North America" => array("Odocoileus", "Bison bison bison", "Ursus arctos horribilis", "Conepatus leuconotus"),
    "South America" => array("Lama glama", "Eunectes murinus", "Serrasalmus rhombeus")
];

// Задание 2: Найдите всех зверей, название которых состоит из двух слов.
// Составьте из них новый массив.
// Решение: формируем массивы из зверей с двуми словами в названии

$double_animals = [];
$creatures = [];
$animals_1 = [];
$animals_2 = [];

foreach ($continents as $region=>$animals) {
//  echo "<br><h2>".$region."</h2><br>";
        foreach ($animals as $animal) {
            if (str_word_count($animal)==2) {
//          echo $animal.", ";
            $double_animals[]=$animal;
            $creatures = explode(" ", $animal);
            $animals_1[]=$creatures[0];
            $animals_2[]=$creatures[1];
            }
        }
}

//  Задание 3: Случайно перемешайте между собой первые и вторые слова названий
//  животных так, чтобы на выходе мы получили выдуманных, фантазийных животных.
//  Решение: а) перемешиваем массив с названиями зверей...

shuffle($animals_2);

// б) создаем массив с фантастическими животными

$fantastic = [];
    for ($i=0; $i<count($animals_1); $i++) {
        $fantastic[] = $animals_1[$i]." ".$animals_2[$i];
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание к лекции 1.3 «Строки, массивы и объекты»</title>

<style>
    html, body {
        font-size: 15px;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
    }
    h2 {
        font-size: 20px;
        font-weight: 700;
        line-height: 10px;
    }
    .continents {
        display: block;
        position: relative;
        margin: 0 auto;
        max-width: 900px;
        padding: 30px auto 20px auto;
        border-bottom: 1px solid red;
    }

    .title {
        display: block;
        position: relative;
        margin: 0 auto;
        text-align: center;
        padding-top: 30px;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
        font-size: 18px;
        font-weight: 600;
    }

    .content {
        display: block;
        position: relative;
        padding: 30px 80px;
        column-count: 2;
        column-width: 340px;
    }

    .animals {
        position: relative;
        display: block;
        margin: 0 auto;
        width: 900px;
        padding-top: 20px;
        border-bottom: 1px solid red;
    }

    .animals::after {
        content: "";
        display: block;
        clear: both;
    }

    .animals div {
        display: inline-block;
        float: left;
        width: 50%;
        vertical-align: top;
        padding-top: 10px;
        padding-left: 60px;
        padding-bottom: 30px;
        box-sizing: border-box;
    }
    pre {
        margin: 0;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
        font-size: 15px;
        font-weight: 400;
        letter-spacing: 1.3px;
    }
</style>

</head>
<body>
    <section class='continents'>
        <div class='title'>
            1. All Continents And Animals:
        </div>
        <div class='content'>
            <?php
                echo "<pre>";
                print_r($continents);
                echo "</pre>";
            ?>
        </div>

    </section>

    <section class='animals'>
        <div class='title'>
            2. Real Two-Word Animals
        </div>
        <div class='title'>
            3. Fantastic Animals
        </div>
        <div class='real'>        
            <?php
                echo "<pre>";
                print_r($double_animals);
                echo "</pre>";
            ?>
        </div>
        <div class='fanta'>
            <?php
                echo "<pre>";
                print_r($fantastic);
                echo "</pre>";
            ?>
        </div>
    </section>

</body>
</html>
