<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Sport extends ActiveRecord
{
    /** @var UploadedFile */
    public $imageFile;

    public static function tableName()
    {
        return 'sport';
    }

    public function rules()
    {
        return [
            [['name', 'category'], 'required'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'category', 'image', 'tags'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true],
        ];
    }

    public function upload()
    {
        if ($this->imageFile) {
            $fileName = time() . '_' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $path = Yii::getAlias('@webroot/uploads/') . $fileName;

            if ($this->imageFile->saveAs($path)) {
                $this->image = $fileName;
                return true;
            }
            return false;
        }
        return true;
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Назва',
            'category' => 'Категорія',
            'description' => 'Опис',
            'imageFile' => 'Зображення',
            'tags' => 'Теги',
        ];
    }

    public function getComments()
    {
        return $this->hasMany(Comment::class, ['sport_id' => 'id'])
            ->where(['parent_id' => null])
            ->orderBy(['created_at' => SORT_DESC]);
    }
}


