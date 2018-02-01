<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание к лекции 1.3 «Строки, массивы и объекты»</title>

<style>
    html, body {
        font-size: 15px;
        font-family: Arial, Helvetica, sans-serif;
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
        padding-bottom: 30px;
        border-bottom: 1px solid red;
    }

    .title {
        display: block;
        position: relative;
        margin: 0 auto;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
        font-weight: 600;
    }

    .content {
        display: block;
        position: relative;
        font-family: "Trebuchet MS", Helvetica, sans-serif;
        font-size: 15px;
        font-weight: 400;
        padding: 30px 120px;
        column-count: 2;
        column-width: 300px;
    }

    .animals {
        position: relative;
        display: block;
        margin: 0 auto;
        width: 900px;
        padding-top: 60px;
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
        padding-left: 60px;
        padding-bottom: 40px;
        box-sizing: border-box;
    }

</style>

<?php

// Выводим континенты и зверей

$continents=[
    "Africa"=> array("Giraffa camelopardalis", "Loxodonta africana", "Equus zebra zebra", "Panthera leo", "Pan troglodytes troglodytes", "Graphiurus crassicaudatus", "Gazella gazella", "Hippopotamus amphibius", "Bufotes viridis", "Pleurodeles waltl", "Dendroaspis polylepis", "Testudo kleinmanni", "Varanus", "Phoenicopterus roseus", "Crocodylus niloticus"),
    "Asia" => array("Dryomys nitedula", "Tamias sibiricus", "Lagurus lagurus", "Talpa altaica"),
    "Australia" => array("Macropus", "Arctocephalus pusillus", "Rattus lutreolus", "Chelodina longicollis", "Canis lupus dingo"),
    "Europe" => array("Meles meles", "Spermophilus pygmaeus", "Ursus arctos", "Pipistrellus pipistrellus"),
    "North America" => array("Odocoileus", "Bison bison bison", "Ursus arctos horribilis", "Conepatus leuconotus"),
    "South America" => array("Lama glama", "Eunectes murinus", "Serrasalmus rhombeus")
];

// Формируем массив из зверей с двуми словами в названии

$double_animals = [];

foreach ($continents as $region=>$animals) {
//  echo "<br><h2>".$region."</h2><br>";
        foreach ($animals as $animal) {
        if (str_word_count($animal)==2) {
//          echo $animal.", ";
        $double_animals[]=$animal;
        }
    }
}

// Выделяем в настоящих названиях "имена" и "фамилии" зверей

$animals_1 = [];
$animals_2 = [];

foreach ($double_animals as $ani) {
    list ($ani_1, $ani_2) = explode(" ", $ani);
    $animals_1[]=$ani_1;
    $animals_2[]=$ani_2;
}

// Перемешиваем массив с "фамилиями" зверей

shuffle($animals_2);

// Создаем массив с фантастическими животными

$fantastic = [];
    for ($i=0; $i<=count($animals_1)-1; $i++) {
        $fantastic[] = $animals_1[$i]." ".$animals_2[$i];
    }

?>

</head>
<body>
<?php
echo "<pre>";

    echo "<section class='continents'>";
    echo "<div class='title'>1. All Continents & Animals:</div>";
    echo "<div class='content'>";
    print_r($continents);
    echo "</div>";
    echo "</section>";
    echo "<section class='animals'>";
    echo "<div class='title'>";
    echo "2. Real Two-Word Animals";
    echo "</div>";
    echo "<div class='title'>";
    echo "3. Fantastic Animals";
    echo "</div>";
    echo "<div class='real'>";
    print_r($double_animals);
    echo "</div>";
    echo "<div class='fanta'>";
    print_r($fantastic);
    echo "</div>";
    echo "</section>";

/*  Дополнительные задания постараюсь сделать после
    более глубокого изучения темы замен в массивах, ок?
*/  
?>

</body>
</html>
