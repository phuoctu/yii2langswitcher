<?php
namespace co_mit\langswitcher\controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LangController
 *
 * @author phuoctu
 */

use Yii;
use co_mit\langswitcher\Module;
use yii\web\Controller;

class LangController extends Controller 
{
    public function actionSwitch($lang='en')
    {
        Yii::$app->session->set(Module::SS_KEY, $lang);
    }
}
