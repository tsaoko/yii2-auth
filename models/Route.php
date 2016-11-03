<?php

namespace tsaoko\auth\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use tsaoko\auth\Module;

/**
 * This is the model class for table "route".
 *
 * @property integer $id
 * @property string $name
 * @property string $route
 * @property integer $created_at
 * @property integer $updated_at
 */
class Route extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%route}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['route','name'], 'string'],
            [['route'], 'required'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'route' => '路由',
            'created_at' => '生成时间',
            'updated_at' => '修改时间',
        ];
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
            ],
        ];
    }


}
