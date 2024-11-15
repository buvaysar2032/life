<?php

namespace common\models;

use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int         $id
 * @property int|null    $date
 * @property string|null $title
 * @property string      $description
 * @property string      $link
 * @property int         $created_at  Дата создания
 * @property int         $updated_at  Дата изменения
 */

#[Schema(properties: [
    new Property(property: 'id', type: 'int'),
    new Property(property: 'date', type: 'int'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'description', type: 'string'),
    new Property(property: 'link', type: 'string'),
])]
class News extends AppActiveRecord
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
        return '{{%news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['date', 'created_at', 'updated_at'], 'integer'],
            [['description', 'link'], 'required'],
            [['title', 'description', 'link'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'date' => Yii::t('app', 'Date'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'link' => Yii::t('app', 'Link'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function fields(): array
    {
        return [
            'id',
            'date',
            'title',
            'description',
            'link'
        ];
    }
}
