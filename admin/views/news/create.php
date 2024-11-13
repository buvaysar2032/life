<?php

use common\components\helpers\UserUrl;
use common\models\NewsSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\News
 */

$this->title = Yii::t('app', 'Create News');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'News'),
    'url' => UserUrl::setFilters(NewsSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
