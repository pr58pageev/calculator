<?php
require_once 'data_base.php';
global $arData;
 ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Калькулятор расчета стоимости карты iPort+ Business</title>
    <link rel="stylesheet" href="/main.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>
<body>

<section>
    <div class="container">
        <div class="left-block">
            <div class="img-block">
                <img src="<?=$arData['ELEMENT']['picture']?>"  alt="">
            </div>
        </div>
        <div class="right-block">
            <div class="description">
                <?=$arData['ELEMENT']['description']?>
            </div>
            <div class="price">
                <?=$arData['ELEMENT']['price']?> руб.
            </div>
            <a href="<?=$arData['ELEMENT']['URL']?>" target="_blank">Купить</a>

            <form id="calc_form" action="" method="POST">
                <input type="hidden" name="price" value="<?=$arData['ELEMENT']['price']?>">

                <label for="replacement_device">
                    <input class="change-input" name="replacement_device" checked id="replacement_device" type="checkbox">
                    Опция подменное устройство
                </label>

                <label for="setting_option">
                    <input class="change-input" name="setting_option" checked id="setting_option" type="checkbox">
                    Опция настройка
                </label>

                <label for="warranty2">
                    <input class="change-input" name="warranty" value="2" id="warranty2" type="radio">
                    2 года гарантии
                </label>

                <label for="warranty3">
                    <input class="change-input" name="warranty" value="3" id="warranty3" checked type="radio">
                    3 года гарантии
                </label>

                <p>Стоимость карты iPort+ Business:</p>
               <div>
                    <span class="result_price">
                    ...
                    </span>
                    руб.
               </div>


            </form>

        </div>
    </div>
</section>

<script src="main.js"></script>
</body>
</html>