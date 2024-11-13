<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%appeal}}".
 *
 * @property int    $id
 * @property string $name
 * @property string $email
 * @property int    $created_at Дата создания
 * @property int    $updated_at Дата изменения
 */
class Appeal extends AppActiveRecord
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
        return '{{%appeal}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'email'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255]
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
            'email' => Yii::t('app', 'Email'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
