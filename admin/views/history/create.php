<?php

use common\components\helpers\UserUrl;
use common\models\HistorySearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\History
 */

$this->title = Yii::t('app', 'Create History');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Histories'),
    'url' => UserUrl::setFilters(HistorySearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
