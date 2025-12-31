<?php

namespace app\models;

use yii\db\ActiveRecord;

class Comment extends ActiveRecord
{
    public static function tableName()
    {
        return 'comment';
    }

    public function rules()
    {
        return [
            [['sport_id', 'user_name', 'content'], 'required'],
            [['sport_id', 'parent_id'], 'integer'],
            [['content'], 'string'],
        ];
    }

    public function getReplies()
    {
        return $this->hasMany(self::class, ['parent_id' => 'id'])
            ->orderBy(['created_at' => SORT_ASC]);
    }
}
