<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property int|null $administrator
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $photo
 * @property int|null $read_books
 * @property string|null $registration_date // как-то исправить на формат даты
 * @property string $token
 *
 * @property Commentaries[] $commentaries
 */

//class Users extends \yii\db\ActiveRecord
class Users extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'users';
    }

    public static function findIdentity($id)
    {
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
    }
    public function validateAuthKey($authKey)
    {
    }

    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['administrator', 'read_books'], 'integer'],
            [['name', 'email', 'password'], 'required'],
            [['registration_date'], 'safe'],
            [['name', 'email', 'photo'], 'string', 'max' => 50],
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

   public function fields()
    {
      /*  return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'photo' => 'Photo',
            'read_books' => 'Read Books',
            'registration_date' => 'Registration Date',
        ];*/

        $fields = parent::fields();

        unset($fields['administrator'], $fields['password'], $fields['token']);

        return $fields;
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
}
