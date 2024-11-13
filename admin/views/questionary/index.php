<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnDate;
use admin\components\widgets\gridView\ColumnSelect2;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use common\enums\Boolean;
use common\enums\QuestionaryStatus;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\QuestionarySearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Questionary
 */

$this->title = Yii::t('app', 'Questionaries');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questionary-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'full_name', 'editable' => false]),
            Column::widget(['attr' => 'age', 'editable' => false]),
            Column::widget(['attr' => 'city', 'editable' => false]),
            ColumnSelect2::widget(['attr' => 'status', 'items' => QuestionaryStatus::class, 'editable' => false]),
            ColumnSelect2::widget(['attr' => 'work', 'items' => Boolean::class, 'editable' => false]),
            ColumnDate::widget(['attr' => 'created_at', 'searchModel' => $searchModel, 'editable' => false]),
//            ColumnDate::widget(['attr' => 'updated_at', 'searchModel' => $searchModel, 'editable' => false]),

            ['class' => GroupedActionColumn::class, 'template' => '{delete}']
        ]
    ]) ?>
</div>
