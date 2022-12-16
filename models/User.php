<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $administrator
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $photo
 * @property int|null $read_books
 * @property string|null $registration_date
 * @property string|null $token
 *
 * @property Commentaries[] $commentaries
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    public static function findIdentity($id)
    {}

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {}
    public function validateAuthKey($authKey)
    {}


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['administrator', 'read_books'], 'integer'],
            [['name', 'email', 'password'], 'required'],
            [['registration_date'], 'safe'],
            [['name', 'email'], 'string', 'max' => 50],
            [['photo'], 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxSize' => 2*1024*1024, 'skipOnEmpty' => true],
            [['password'], 'string', 'max' => 100],
            [['token'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'administrator' => 'Administrator',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'photo' => 'Photo',
            'read_books' => 'Read Books',
            'registration_date' => 'Registration Date',
            'token' => 'Token',
        ];
    }

    /**
     * Gets query for [[Commentaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommentaries()
    {
        return $this->hasMany(Commentaries::className(), ['u_id' => 'id']);
    }

    public function fields()
    {
        $fields = parent::fields();

        unset($fields['administrator'], $fields['password'], $fields['token']);

        return $fields;
    }

    public function beforeValidate()
    {
        $this->photo=UploadedFile::getInstanceByName('photo');
        return parent::beforeValidate();
    }
}
