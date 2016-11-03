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
 * @property integer $role
 * @property integer $route_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Role extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role','route_id','created_at','updated_at'], 'integer'],
            [['route_id','role'], 'required'],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role'=>'角色',
            'route_id' => '路由ID',
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
