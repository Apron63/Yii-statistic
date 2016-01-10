<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property integer $pr_id
 * @property string $pr_name
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pr_name'], 'required'],
            [['pr_name'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pr_id' => 'Id',
            'pr_name' => 'Наименование',
        ];
    }

    /*-----------------------------------------------------------------------------------*/
    public function getStream()
    {
        return $this->hasOne(Stream::className(), ['pr_id' => 'pr_id']);
    }

    public function getStreamName()
    {
    	return $this->stream ? $this->stream->st_name : 'не определено';
    }

    public static function getStreamList()
    {
	$droptions = Stream::find() ->asArray()->all();
	return Arrayhelper::map($droptions,'st_id','st_name');
    }

    public static function getStreamFilter()
    {
	$droptions = Stream::find() ->asArray()->all();
	return Arrayhelper::map($droptions,'st_name','st_name');
    }

}
