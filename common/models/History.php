<?php

namespace common\models;

use common\components\helpers\UserUrl;
use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%history}}".
 *
 * @property int         $id
 * @property string|null $accusation
 * @property string|null $full_name
 * @property string|null $add_information
 * @property string|null $image_desktop
 * @property string|null $image_mobile
 * @property string|null $history
 * @property string      $link
 * @property int         $created_at      Дата создания
 * @property int         $updated_at      Дата изменения
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'int'),
    new Property(property: 'accusation', type: 'string'),
    new Property(property: 'full_name', type: 'string'),
    new Property(property: 'add_information', type: 'string'),
    new Property(property: 'image_desktop', type: 'string'),
    new Property(property: 'image_mobile', type: 'string'),
    new Property(property: 'history', type: 'string'),
    new Property(property: 'link', type: 'string'),
])]
class History extends AppActiveRecord
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
        return '{{%history}}';
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
            [['accusation', 'full_name', 'add_information', 'image_desktop', 'image_mobile', 'link'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'accusation' => Yii::t('app', 'Accusation'),
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

    public function fields(): array
    {
        return [
            'id',
            'accusation',
            'full_name',
            'add_information',
            'image_desktop' => fn() => UserUrl::toAbsolute($this->image_desktop),
            'image_mobile' => fn() => UserUrl::toAbsolute($this->image_mobile),
            'history',
            'link',
        ];
    }
}
