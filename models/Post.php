<?php

namespace app\models;


use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'posts';
    }

    public function rules()
    {
        return [
            [['title', 'content', 'category_id'], 'required'],
            [['content'], 'string'],
            [['category_id'], 'integer'],
            [['image', 'tags'], 'string', 'max' => 255],
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id'])
            ->where(['parent_id' => null])
            ->orderBy(['created_at' => SORT_DESC]);
    }
}

