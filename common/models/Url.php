<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "url".
 *
 * @property integer $url_id
 * @property string $url_url
 * @property string $url_name
 * @property integer $url_rot
 * @property string $url_comment
 * @property integer $pr_id
 */
class Url extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url_url', 'url_name', 'url_rot',], 'required'],
            [['url_comment', 'st_id'], 'safe'],
            [['url_url', 'url_comment'], 'string'],
            [['url_rot',], 'integer'],
            [['url_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'url_id' => 'Url ID',
            'url_url' => 'URL',
            'url_name' => 'Название',
            'url_rot' => 'Ротация',
            'url_comment' => 'Комментарий',
            'pr_id' => 'Проект',
        ];
    }
}
