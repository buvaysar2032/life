<?php

use common\components\helpers\UserUrl;
use common\models\AccusationSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Accusation
 */

$this->title = Yii::t('app', 'Create Accusation');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Accusations'),
    'url' => UserUrl::setFilters(AccusationSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accusation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
