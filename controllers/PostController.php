<?php

namespace app\controllers;

use Yii;
use app\models\Sport;
use app\models\Comment;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PostController extends Controller
{
    public function actionIndex($category = null, $tag = null)
    {
        $query = Sport::find();

        if ($category) {
            $query->andWhere(['category' => $category]);
        }

        if ($tag) {
            $query->andWhere(['like', 'tags', $tag]);
        }

        $posts = $query->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index', compact('posts'));
    }

    public function actionView($id)
    {
        $post = Sport::findOne($id);
        if (!$post) {
            throw new NotFoundHttpException();
        }

        $comment = new Comment();

        if ($comment->load(Yii::$app->request->post())) {
            $comment->sport_id = $id;
            $comment->parent_id = Yii::$app->request->post('parent_id');
            $comment->user_name = Yii::$app->user->isGuest
                ? 'Гість'
                : Yii::$app->user->identity->name;

            $comment->save(false);
            return $this->refresh();
        }

        return $this->render('view', compact('post', 'comment'));
    }

    public function actionDeleteComment($id)
    {
        $comment = Comment::findOne($id);

        if ($comment && Yii::$app->user->identity->isAdmin()) {
            $sportId = $comment->sport_id;
            $comment->delete();
            return $this->redirect(['view', 'id' => $sportId]);
        }

        throw new NotFoundHttpException();
    }
}
