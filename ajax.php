<?php
//Небольшая защита,если переводить на битрикс, то можно будет готовыми методами воспользоваться
function getPostNormal($ar){
    foreach ($ar as $key => $item ) {
        $new_ar[$key] = trim($item);
    }
    return $new_ar;
}

$arBaseData = array();
$arBaseData['BASE_PRICE'] = 1990; //Цена База
$arBaseData['OPTION_SETTING_PRICE'] = 750; //Опция настройка

//Массив с данными
$arBaseData['PRICE_ARRAY'] = array(
    0=> array(
        'MIN_PRICE'=>15800,
        'MAX_PRICE'=>34999,
        'OPTION_DEVICE_REPLACE_PRICE'=>750,
        'WARRANTY_2_YEARS_PRICE'=> 500,
        'WARRANTY_3_YEARS_PRICE'=> 1100,
    ),
    1=> array(
        'MIN_PRICE'=>35000,
        'MAX_PRICE'=>49999,
        'OPTION_DEVICE_REPLACE_PRICE'=>750,
        'WARRANTY_2_YEARS_PRICE'=> 800,
        'WARRANTY_3_YEARS_PRICE'=> 2500,
    ),
    3=> array(
        'MIN_PRICE'=>50000,
        'MAX_PRICE'=>79999,
        'OPTION_DEVICE_REPLACE_PRICE'=>750,
        'WARRANTY_2_YEARS_PRICE'=> 1100,
        'WARRANTY_3_YEARS_PRICE'=> 5200,
    ),
    4=> array(
        'MIN_PRICE'=>80000,
        'MAX_PRICE'=>99999,
        'OPTION_DEVICE_REPLACE_PRICE'=>750,
        'WARRANTY_2_YEARS_PRICE'=> 1400,
        'WARRANTY_3_YEARS_PRICE'=> 5000,
    ),
    5=> array(
        'MIN_PRICE'=>100000,
        'MAX_PRICE'=>120000,
        'OPTION_DEVICE_REPLACE_PRICE'=>750,
        'WARRANTY_2_YEARS_PRICE'=> 2200,
        'WARRANTY_3_YEARS_PRICE'=> 7700,
    ),

);


$arRequest = getPostNormal($_POST);

//Получим данные, по которым будем считать, в зависимости от цены
foreach ($arBaseData['PRICE_ARRAY'] as $arBaseDatum) {
    if($arRequest['price']>=$arBaseDatum['MIN_PRICE'] && $arRequest['price']<=$arBaseDatum['MAX_PRICE']){
        $tempSetting = $arBaseDatum;
    }
}

//Массив, который вернем в JSON
$arResult = array();

//Проверяем, какие чекбоксы были проставлены и добавляем нужную стоимость к итоговой сумме

//Опция подменное устройство
if(!empty($arRequest['replacement_device'])){
    $arResult['TOTAL_CARD'] +=  $tempSetting['OPTION_DEVICE_REPLACE_PRICE'];
}

//Опция Настройка
if(!empty($arRequest['setting_option'])){
    $arResult['TOTAL_CARD'] +=  $arBaseData['OPTION_SETTING_PRICE'];
}

//Добавляем базовую цену
$arResult['TOTAL_CARD'] +=  $arBaseData['BASE_PRICE'];

//Цена за гарантию
$year_war = $arRequest['warranty'];

$arResult['TOTAL_CARD'] +=  $tempSetting['WARRANTY_'.$year_war.'_YEARS_PRICE'];
$arResult['TOTAL_PRICE'] = $arRequest['price'] + $arResult['TOTAL_CARD'];


echo json_encode( $arResult ); ?>