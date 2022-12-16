<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $b_name
 * @property string|null $genres
 * @property string|null $b_photo
 * @property string|null $description
 * @property string $author
 * @property string $publisher
 * @property int $publication_year
 * @property float|null $rating
 * @property int|null $read
 * @property string $date
 *
 * @property Commentaries[] $commentaries
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return
        [
            [['b_name', 'author', 'publisher', 'publication_year'], 'required'],
            [['publication_year', 'read'], 'integer'],
            [['rating'], 'number'],
            [['date'], 'safe'],
            [['b_name'], 'string', 'max' => 50],
            [['genres'], 'string', 'max' => 600],
            [['author', 'publisher'], 'string', 'max' => 100],
            [['b_photo'], 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxSize' => 2*1024*1024, 'skipOnEmpty' => true],
            [['description'], 'string', 'max' => 10000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'b_name' => 'B Name',
            'genres' => 'Genres',
            'b_photo' => 'B Photo',
            'description' => 'Description',
            'author' => 'Author',
            'publisher' => 'Publisher',
            'publication_year' => 'Publication Year',
            'rating' => 'Rating',
            'read' => 'Read',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Commentaries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCommentaries()
    {
        return $this->hasMany(Commentaries::className(), ['b_id' => 'id']);
    }

    public function beforeValidate()
    {
        $this->b_photo=UploadedFile::getInstanceByName('b_photo');
        return parent::beforeValidate();
    }
}
