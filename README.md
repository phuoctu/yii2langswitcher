# yii2langswitcher
Yii2 Language switcher bar
Create a language selector on screen so user can switch language very easy
It's best in development and test

Using:
$config['bootstrap'][] = 'langswitcher';
$config['modules']['langswitcher'] = [
    'class' => 'co_mit\langswitcher\Module',
    'langs'=>[
      'en'=>'English',
      'ja'=>'Japanese'
    ],
    'defaultLang'=>'en'
];
