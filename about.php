<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание к лекции 1.1 «Введение в PHP»</title>

<style>
    body {
        font-family: sans-serif;  
    }
            
    dl {
        display: table-row;
    }
            
    dt, dd {
        display: table-cell;
        padding: 5px 10px;
    }
</style>
</head>

<?php
    $userName = "Александр";
    $userAge = 50;
    $userEmail = "100kphoto@mail.ru";
    $userCity = "Москва";
    $userProf = "Журналист";
?>

<body>
    <h1>Страница Александра</h1>
    <dl>
        <dt>Имя</dt>
        <dd>
            <?= $userName ?>
        </dd>
    </dl>
    <dl>
        <dt>Возраст</dt>
        <dd>
            <?= $userAge ?>
        </dd>
    </dl>
    <dl>
        <dt>Адрес электронной почты</dt>
        <dd><a href="mailto:100kphoto@mail.ru">
            <?= $userEmail ?>
        </a></dd>
    </dl>
    <dl>
        <dt>Город</dt>
        <dd>
            <?= $userCity ?>
        </dd>
    </dl>
    <dl>
        <dt>О себе</dt>
        <dd>
            <?= $userProf ?>
        </dd>
    </dl>

</body>
</html>