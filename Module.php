<?php
namespace co_mit\langswitcher;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Module
 *
 * @author phuoctu
 */

use yii\base\BootstrapInterface;
use yii\web\View;
use yii\web\Application;
use Yii;
use yii\helpers\Url;

class Module extends \yii\base\Module implements BootstrapInterface {
    const SS_KEY='co_mit_switcherlang_keylang';
    public $controllerNamespace = 'co_mit\langswitcher\controllers';
    public $langs=[
        'en'=>'English',
        'ja'=>'Japanese'
    ];
    public $defaultLang='en';
    
    public function init() {
        parent::init();
        Yii::setAlias('@langswitcher', __DIR__);
    }
    
    public function bootstrap($app) {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () use ($app) {
            $app->getView()->on(View::EVENT_END_BODY, [$this, 'renderSwitcherBar']);
        });
        
        $app->on(Application::EVENT_BEFORE_ACTION, [$this, 'setAppLang']);

        $app->getUrlManager()->addRules([
            $this->id => $this->id,
            $this->id . '/<controller:[\w\-]+>/<action:[\w\-]+>' => $this->id . '/<controller>/<action>',
        ], false);        
    }
    
    public function renderSwitcherBar($event)
    {   
        if (Yii::$app->getRequest()->getIsAjax()) {
            return;
        }
                
        /* @var $view View */
        $view = $event->sender;
        echo $view->renderPhpFile(__DIR__ . '/views/index.php', [
            'langs'=>$this->langs,
            'selectLang'=>$this->getCurrentLang(),
            'url'=>  Url::toRoute([$this->id . '/lang/switch'])
        ]);             
    }
    
    public function setAppLang()
    {        
        Yii::$app->language=  $this->getCurrentLang();
    }
    
    private function getCurrentLang(){
        $lang=Yii::$app->session->get(Module::SS_KEY);
        return $lang?$lang: $this->defaultLang;
    }
}
