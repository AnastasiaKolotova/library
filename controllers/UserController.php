<?php
namespace app\controllers;

use app\controllers\FunctionController;
use app\models\User;
use app\models\LoginForm;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

class UserController extends FunctionController
{
    public $modelClass = 'app\models\User';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only'=>['account','edit','delete']
        ];

        return $behaviors;
    }

    public function actionCreate()
    {
        $data=Yii::$app->request->post();
        $user=new User();
        $user->load($data, '');

        if (!$user->validate()) return $this->validation($user);

        $user->password = Yii::$app->getSecurity()->generatePasswordHash($user->password);

        if (isset($_FILES['photo']))
        {
            $user->photo = UploadedFile::getInstanceByName('photo');
            $image_name = '/assets/upload/' . Yii::$app->getSecurity()->generateRandomString() . '.' . $user->photo->extension;
            $user->photo->saveAs(Yii::$app->basePath . $image_name);
            $user->photo = $image_name;
        }

        $user->save(false);

        return $this->send(204, null);
    }

    public function actionLogin()
    {
        $data=Yii::$app->request->post();
        $login_data=new LoginForm();
        $login_data->load($data, '');

        if (!$login_data->validate()) return $this->validation($login_data);

        $user=User::find()->where(['email'=>$login_data->email])->one();

        if (!is_null($user))
        {
            if (Yii::$app->getSecurity()->validatePassword($login_data->password, $user->password))
            {
                $token = Yii::$app->getSecurity()->generateRandomString();
                $user->token = $token;
                $user->save(false);
                $data = ['data' => ['token' => $token]];
                return $this->send(200, $data);
            }
         }

        return $this->send(401, ['error'=>['code'=>401, 'message'=>'Unauthorized',
            'errors'=>['error'=>'Неверный email или пароль']]]);
    }

    public function actionAccount()
    {
         $user = Yii::$app->user->identity;
         return $this->send(200,['data'=>['profile'=>$user]]);
    }

    public function actionEdit ()
    {
        $user = Yii::$app->user->identity;
        if (!$user->validate()) return $this->validation($user);

        if (isset($_FILES['photo']))
        {
            @unlink(Yii::$app->basePath.$user->photo); //@ - означает продолжить выполнять, даже если есть ошибка

            $user->photo = UploadedFile::getInstanceByName('photo');

            $image_name='/assets/upload/'. Yii::$app->getSecurity()->generateRandomString() . '.' . $user->photo->extension;
            $user->photo->saveAs(Yii::$app->basePath.$image_name);
            $user->photo=$image_name;
        }

        $request=Yii::$app->request->getBodyParams();
        if(isset($request['name'])) $user->name=$request['name'];
        if(isset($request['email'])) $user->email=$request['email'];
        if(isset($request['password'])) $user->password=Yii::$app->getSecurity()->generatePasswordHash($request['password']);

        $user->save(false);

        return $this->send(200, ['data'=>['code'=>200, 'message'=>'Данные профиля изменены']]);
    }

    public function actionDelete()
    {
        $user = Yii::$app->user->identity;

        if (!$user) return $this->send(404, ['data'=>['code'=>404, 'message'=>'Пользователь не найден']]);
        $user->delete();

        return $this->send(200, ['data'=>['code'=>200, 'message'=>'Пользователь удален']]);
    }
}

