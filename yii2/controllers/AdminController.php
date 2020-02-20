<?php


namespace app\controllers;


use yii\web\Controller;

class AdminController extends Controller
{
    public $defaultAction = 'index';
    public $layout = 'admin';

    public function actionIndex()
    {
        return $this->render('index');
    }
}