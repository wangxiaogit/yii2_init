<?php
namespace api\controllers;

use yii\rest\Controller;
class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return ['api接口链接成功！'];
    }
}
