<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/6/14
 * Time: 17:09
 */

namespace frontend\controllers;


use common\models\Books;
use common\models\Chaptor;
use moonland\phpexcel\Excel;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
class ExcelController extends Controller
{
    public function actionIndex()
    {
        $models = Books::find()
            ->joinWith('chaptor')->asArray()->all();
        //print_r($models);exit;
//            ->leftJoin(Chaptor::tableName(), 'books.id = chaptor.book_id')
//            ->asArray()
//            ->all();
//        print_r($models);exit;
//        $dataProvider = new ActiveDataProvider([
//            'query' => $models
//        ]);
//        $dataProvider->pagination = false;

        Excel::export([
            'models' => $models,
            'fileName' => 'test',
            'columns' => ['id', 'code', 'name', 'chaptor.id'],
            'headers' => [
                'id' => '编号',
                'code' => '编码',
                'name' => '名称',
                'chaptor.id' => '名称'
            ]
        ]);
    }
}