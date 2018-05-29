<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Posts */
/* @var $comments_model common\models\Comments */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="posts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Yii::$app->user->can('editor') ? Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) : ''?>
        <?= Yii::$app->user->can('editor') ? Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) : ''?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'title',
            'body:ntext',
            'image',
        ],
    ]) ?>
    <h3>Comments</h3>
    <?php
        if(! empty($model->comments)) :
            foreach ($model->comments as $comment) :
                ?>
            <p>
                <b><?= Html::encode($comment->user->username)?></b>

            </p>
                <blockquote>
                    <?= Html::encode($comment->body) ?>
                </blockquote>
    <?
            endforeach;
        endif;
    ?>

    <?= $this->render('_comment_form', [
        'model' => $comments_model,
    ]) ?>

</div>
