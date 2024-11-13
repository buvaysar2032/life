<?php

use admin\widgets\ckeditor\EditorClassic;
use admin\widgets\ckfinder\CKFinderInputFile;
use common\widgets\AppActiveForm;
use kartik\icons\Icon;
use yii\bootstrap5\Html;
use yii\helpers\Url;

/**
 * @var $this     yii\web\View
 * @var $model    common\models\Accusation
 * @var $form     AppActiveForm
 * @var $isCreate bool
 */
?>

<div class="accusation-form">

    <?php $form = AppActiveForm::begin() ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_information')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_desktop')->widget(CKFinderInputFile::class) ?>

    <?= $form->field($model, 'image_mobile')->widget(CKFinderInputFile::class) ?>

    <?= $form->field($model, 'history')->widget(EditorClassic::class) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php if ($isCreate) {
            echo Html::submitButton(
                Icon::show('save') . Yii::t('app', 'Save And Create New'),
                ['class' => 'btn btn-success', 'formaction' => Url::to() . '?redirect=create']
            );
            echo Html::submitButton(
                Icon::show('save') . Yii::t('app', 'Save And Return To List'),
                ['class' => 'btn btn-success', 'formaction' => Url::to() . '?redirect=index']
            );
        } ?>
        <?= Html::submitButton(Icon::show('save') . Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php AppActiveForm::end() ?>

</div>
