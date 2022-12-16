<?php
namespace app\controllers;

use app\models\Commentaries;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use app\controllers\FunctionController;

class CommentsController extends FunctionController
{
    public $modelClass = 'app\models\Commentaries';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only'=>['create']
        ];

        return $behaviors;
    }

    public function actionCreate()
    {
        $data = Yii::$app->request->post();
        $comment=new Commentaries();
        $comment->load($data, '');

        if (!$comment->validate()) return $this->validation($comment);

        $comment->u_id=Yii::$app->user->identity->id;
        $comment->b_id=$data['b_id'];;

        $comment->save(false);
        return $this->send(204, null);
    }
}