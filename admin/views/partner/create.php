<?php

use common\components\helpers\UserUrl;
use common\models\PartnerSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Partner
 */

$this->title = Yii::t('app', 'Create Partner');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Partners'),
    'url' => UserUrl::setFilters(PartnerSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partner-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
