<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%questionary}}".
 *
 * @property int         $id
 * @property string|null $full_name
 * @property int|null    $age
 * @property string|null $city
 * @property int|null    $status
 * @property int|null    $work
 * @property int         $created_at Дата создания
 * @property int         $updated_at Дата изменения
 */
class Questionary extends AppActiveRecord
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
        return '{{%questionary}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['age', 'status', 'work', 'created_at', 'updated_at'], 'integer'],
            [['full_name', 'city'], 'string', 'max' => 255]
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
            'age' => Yii::t('app', 'Age'),
            'city' => Yii::t('app', 'City'),
            'status' => Yii::t('app', 'Status'),
            'work' => Yii::t('app', 'Work'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
