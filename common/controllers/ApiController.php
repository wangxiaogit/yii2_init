<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/6/8
 * Time: 17:51
 */

namespace common\controllers;

use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
class ApiController extends ActiveController
{
    public $unVerification = [];

    public $serializer = [
        'class'=> 'yii\rest\Serializer',
        'collectionEnvelope' => 'items'
    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        //token验证
        $behaviors['authenticatior']= [
            'class'=> QueryParamAuth::className(), //请求参数
            'optional' => $this->unVerification
        ];

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();

        unset($actions['index'], $actions['update'], $actions['create'], $actions['delete'], $actions['view']);

        return $actions;
    }
}