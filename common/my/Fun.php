<?php
namespace common\my;

use Yii;
class Fun
{    
    public static function echoJson($return) {
        echo json_encode($return);
        Yii::$app->end();
    }
}
