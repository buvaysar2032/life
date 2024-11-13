<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\detailView\ColumnImage;
use admin\components\widgets\gridView\Column;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\AccusationSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Accusation
 */

$this->title = Yii::t('app', 'Accusations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accusation-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <div>
        <?=
            RbacHtml::a(Yii::t('app', 'Create Accusation'), ['create'], ['class' => 'btn btn-success']);
//           $this->render('_create_modal', ['model' => $model]);
        ?>
    </div>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'full_name']),
            Column::widget(['attr' => 'add_information']),
            ColumnImage::widget(['attr' => 'image_desktop']),
            ColumnImage::widget(['attr' => 'image_mobile']),
//            Column::widget(['attr' => 'history', 'format' => 'ntext']),
//            Column::widget(['attr' => 'link']),
//            ColumnDate::widget(['attr' => 'created_at', 'searchModel' => $searchModel, 'editable' => false]),
//            ColumnDate::widget(['attr' => 'updated_at', 'searchModel' => $searchModel, 'editable' => false]),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
