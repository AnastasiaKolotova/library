<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "commentaries".
 *
 * @property int $id
 * @property int $b_id
 * @property int $u_id
 * @property float $rating
 * @property string|null $comment
 * @property float $date
 *
 * @property Books $b
 * @property Users $u
 */
class Commentaries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'commentaries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['b_id', 'comment', 'rating'], 'required'],
            [['b_id', 'u_id', 'rating'], 'integer'],
            [['date'], 'number'],
            [['comment'], 'string', 'max' => 300],
            [['u_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['u_id' => 'id']],
            [['b_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['b_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'b_id' => 'B ID',
            'u_id' => 'U ID',
            'rating' => 'Rating',
            'comment' => 'Comment',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[B]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getB()
    {
        return $this->hasOne(Books::className(), ['id' => 'b_id']);
    }

    /**
     * Gets query for [[U]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getU()
    {
        return $this->hasOne(Users::className(), ['id' => 'u_id']);
    }
}
