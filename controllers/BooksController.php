<?php
namespace app\controllers;

use app\models\Books;
use app\controllers\FunctionController;
use Yii;
use yii\web\UploadedFile;
use yii\filters\auth\HttpBearerAuth;

class BooksController extends FunctionController
{
    public $modelClass = 'app\models\Books';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only'=>['create','edit','delete']
        ];

        return $behaviors;
    }

    public function actionCreate()
    {
        $data=Yii::$app->request->post();
        $book=new Books();
        $book->load($data, '');

        if (!$book->validate()) return $this->validation($book);

        if ($this->is_admin())
        {
            if (isset($_FILES['b_photo']))
            {
                $book->b_photo = UploadedFile::getInstanceByName('b_photo');
                $image_name = '/assets/book_photo/' . Yii::$app->getSecurity()->generateRandomString() . '.' . $book->b_photo->extension; // какой то косяк

                $book->b_photo->saveAs(Yii::$app->basePath . $image_name);
                $book->b_photo = $image_name;
            }

            $book->save(false);

            return $this->send(201, ['data' => ['code' => 201, 'message' => 'Книга создана']]);
        }
        else return $this->send(403, ['data'=>['code'=>403, 'message'=>'Действие заблокировано']]);
    }

    public function actionView ()
    {
        $books=Books::find()
            ->orderBy(['rating' => SORT_DESC,])
            ->all();

        return $this->send(200, ['data'=>['books'=>$books]]);
    }

    public function actionEdit ($id)
    {
        $book = Books::findOne($id);
        if (!$book->validate()) return $this->validation($book);

        if ($this->is_admin()) {
            if (isset($_FILES['b_photo'])) {
                @unlink(Yii::$app->basePath . $book->b_photo);
                $book->b_photo = UploadedFile::getInstanceByName('b_photo');

                $image_name = '/assets/book_photo/' . Yii::$app->getSecurity()->generateRandomString() . '.' . $book->b_photo->extension;

                @$book->b_photo->saveAs(Yii::$app->basePath . $image_name);
                $book->b_photo = $image_name;
            }

            $request = Yii::$app->request->getBodyParams();

            foreach ($request as $key => $value) {
                $book->$key = $value;
            }

            $book->save(false);

            return $this->send(200, ['data' => ['code' => 200, 'message' => 'Данные о книге изменены']]);
        }
        else return $this->send(403, ['data'=>['code'=>403, 'message'=>'Действие заблокировано']]);
    }

    public function actionDelete ($id)
    {
        $book=Books::findOne($id);

        if ($this->is_admin())
        {
            if (!$book) return $this->send(404, ['data' => ['code' => 404, 'message' => 'Книга не найдена']]);

            $book->delete();

            return $this->send(200, ['data' => ['code' => 200, 'message' => 'Книга удалена']]);
        }
        else return $this->send(403, ['data'=>['code'=>403, 'message'=>'Действие заблокировано']]);
    }
}