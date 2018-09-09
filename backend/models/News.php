<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $textArea
 * @property string $img
 * @property string $added
 */
class News extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'textArea', 'img', 'added'], 'required'],
            [['textArea'], 'string'],
            [['added'], 'safe'],
            [['name','img'],'string','max' => 255],
            [['file'], 'file' ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'textArea' => 'Text Area',
            'img' => 'Img',
            'added' => 'Added',
            'file' => 'Img',
        ];
    }

    /**
     * {@inheritdoc}
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }
}
