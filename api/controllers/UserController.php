<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/6/8
 * Time: 17:18
 */

namespace api\controllers;

use common\controllers\ApiController;
use common\models\LoginForm;
class UserController extends ApiController
{
    public $modelClass = 'common\models\user';

    public $unVerification = ['login'];

    public function actionLogin()
    {
        $model = new LoginForm();

        $model->username = $_POST['username'];
        $model->password = $_POST['password'];

        if ($access_token = $model->apiLogin()) {
            return ['status'=>1, 'msg'=>'登录成功!', 'access_token' => $access_token];
        } else {
            return ['status'=>-1, 'msg'=>$model->getErrors()];
        }
    }
}