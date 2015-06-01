<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use co_mit\langswitcher\components\LangSwitcherAssets;

LangSwitcherAssets::register(Yii::$app->getView());
?>

<div id="comit-langswitcher-bar">
    <?=    Html::label('Language: ', '', ['style'=> 'color: red']) ?>
    <?= Html::dropDownList('lang', $selectLang, $langs, [
        'id'=>'comit-lang-selector',
        'data-url'=>$url
    ]) ?>
</div>