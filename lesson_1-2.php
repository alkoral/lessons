<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Домашнее задание к лекции 1.2 «Основы PHP»</title>
    <style>
        p {
            font: 18px normal arial, non-serif;
            text-align: left;
        }
        article {
            position: relative;
            display: block;
            margin: 0 auto;
            max-width: 700px;
            text-align: center;
        }
    </style>

</head>
<body>
    <article>
        <p>

        <?php

        //  $x=rand(0,100);
            $x = $_GET['x'];
            $a=1;
            $b=1;
            echo "Число: <strong>".$x."</strong>";

            while ($a <= $x) {
                if ($a == $x) {
                    echo "<br><strong>Задуманное число входит в числовой ряд Фибоначчи</strong><br>";
                    break;
                }
                else {
                    $c=$a;
                    $a=$a+$b;
                    $b = $c;
                }
            }
        if ($a > $x) {
            echo "<br><strong>Задуманное число НЕ входит в числовой ряд Фибоначчи</strong><br>";
        }

//              echo "<br>a = ".$a;
//              echo "<br>b = ".$b;
        ?>
        </p>

        <p>
        <a href="https://ru.wikipedia.org/wiki/%D0%A7%D0%B8%D1%81%D0%BB%D0%B0_%D0%A4%D0%B8%D0%B1%D0%BE%D0%BD%D0%B0%D1%87%D1%87%D0%B8" target="_blank">Числа Фибоначчи</a> — элементы числовой последовательности<br>
        1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233, 377, 610, 987, 1597, 2584, 4181, 6765, 10946, …<br>
        в которой каждое последующее число равно сумме двух предыдущих чисел. Названы по имени средневекового математика Леонардо Пизанского (известного как Фибоначчи).
        </p>
    </article>

    </body>
    </html>