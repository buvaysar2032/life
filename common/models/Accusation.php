<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%accusation}}".
 *
 * @property int         $id
 * @property string|null $full_name
 * @property string|null $add_information
 * @property string|null $image_desktop
 * @property string|null $image_mobile
 * @property string|null $history
 * @property string      $link
 * @property int         $created_at      Дата создания
 * @property int         $updated_at      Дата изменения
 */
class Accusation extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'timestamp' => [
                'class' => TimestampBehavior::class,
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%accusation}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['history'], 'string'],
            [['link'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['full_name', 'add_information', 'image_desktop', 'image_mobile', 'link'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'add_information' => Yii::t('app', 'Add Information'),
            'image_desktop' => Yii::t('app', 'Image Desktop'),
            'image_mobile' => Yii::t('app', 'Image Mobile'),
            'history' => Yii::t('app', 'History'),
            'link' => Yii::t('app', 'Link'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}