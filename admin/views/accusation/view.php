<?php

use admin\components\widgets\detailView\Column;
use admin\components\widgets\gridView\ColumnImage;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\models\AccusationSearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Accusation
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Accusations'),
    'url' => UserUrl::setFilters(AccusationSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accusation-view">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <p>
        <?= RbacHtml::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= RbacHtml::a(
            Yii::t('app', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post'
                ]
            ]
        ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            Column::widget(),
            Column::widget(['attr' => 'full_name']),
            Column::widget(['attr' => 'add_information']),
            ColumnImage::widget(['attr' => 'image_desktop']),
            ColumnImage::widget(['attr' => 'image_mobile']),
            Column::widget(['attr' => 'history']),
            Column::widget(['attr' => 'link']),
            Column::widget(['attr' => 'created_at', 'format' => 'datetime']),
            Column::widget(['attr' => 'updated_at', 'format' => 'datetime']),
        ]
    ]) ?>

</div>
