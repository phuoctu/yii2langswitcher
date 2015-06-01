<?php
namespace co_mit\langswitcher\components;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LangSwitcherAssets
 *
 * @author phuoctu
 */

use yii\web\AssetBundle;
class LangSwitcherAssets extends AssetBundle {
    public $sourcePath = '@langswitcher/assets';
    public $css = [
        'langswitcher.css'
    ];
    public $js = [
        'langswitcher.js'
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];
}
