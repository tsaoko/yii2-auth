<?php
namespace tsaoko\auth\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use tsaoko\auth\models\Role;
use tsaoko\auth\models\Route;
use tsaoko\auth\models\RouteQuery;

class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all Route models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RouteQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Route model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Route the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Route::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    //改变名称
    public function actionChangeName(){
        $id = isset($_POST['id'])?$_POST['id']:0;
        $name = isset($_POST['value'])?$_POST['value']:'';

        if(!$id||!$name){
            return Json::encode(['flag'=>0,'msg'=>'参数异常，修改失败']);
        }

        $flag = Route::updateAll(['name'=>$name],['id'=>$id]);
        if($flag){
            return Json::encode(['flag'=>1,'msg'=>'修改成功']);
        } else {
            return Json::encode(['flag'=>0,'msg'=>'修改失败']);
        }
    }

}
