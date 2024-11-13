<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnDate;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\AppealSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Appeal
 */

$this->title = Yii::t('app', 'Appeals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appeal-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'name', 'editable' => false]),
            Column::widget(['attr' => 'email', 'format' => 'email', 'editable' => false]),
            ColumnDate::widget(['attr' => 'created_at', 'searchModel' => $searchModel, 'editable' => false]),
            ColumnDate::widget(['attr' => 'updated_at', 'searchModel' => $searchModel, 'editable' => false]),

            ['class' => GroupedActionColumn::class, 'template' => '{delete}']
        ]
    ]) ?>
</div>
