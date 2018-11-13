<?php

namespace app\controllers;
use app\models\Logs;
use app\models\LogsSearch;
use Yii;
use yii\helpers\Url;


class LogsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $searchModel = new LogsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionDelete()
    {
        Logs::deleteAll();
        for($i = 0; $i < 200; $i++){
            $logs = new Logs();
            $logs->time = $this->generateDate();
            $logs->key = $this->generateString();
            $logs->save();
        }
        //$this->redirect(Url::to('/'));
        $this->goBack();
    }

    public function generateDate()
    {
        $timestamp = rand( strtotime("Jan 01 2018"), strtotime("Dec 31 2018") );
        $randomDate = strtotime(date("d-m-Y", $timestamp ));
        return $randomDate;
    }

    public function generateString()
    {
        $alphabet = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        $size = sizeof($alphabet)-1;
        $max = 8;
        for ($i = 0; $max > $i; $i++){
            $string .= $alphabet[rand(0,$size)];
        }
        return $string;
    }

}
