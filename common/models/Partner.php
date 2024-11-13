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
 * This is the model class for table "{{%partner}}".
 *
 * @property int         $id
 * @property string|null $name
 * @property string|null $logo
 * @property string      $link
 * @property int         $created_at Дата создания
 * @property int         $updated_at Дата изменения
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'int'),
    new Property(property: 'name', type: 'string'),
    new Property(property: 'logo', type: 'string'),
    new Property(property: 'link', type: 'string'),
])]
class Partner extends AppActiveRecord
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
        return '{{%partner}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['link'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'logo', 'link'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'logo' => Yii::t('app', 'Logo'),
            'link' => Yii::t('app', 'Link'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function fields(): array
    {
        return [
            'id',
            'name',
            'logo' => fn() => UserUrl::toAbsolute($this->logo),
            'link'
        ];
    }
}
