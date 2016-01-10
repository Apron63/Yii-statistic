<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "stream".
 *
 * @property integer $st_id
 * @property integer $pr_id
 * @property string $st_name
 */
class Stream extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stream';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_name', 'st_url'], 'required'],
            [['st_name'], 'string', 'max' => 100],
            [['st_cnt',], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'st_id' => 'St ID',
            'pr_id' => 'Pr ID',
            'st_name' => 'Наименование',
            'st_cnt' => 'Переходы',
            'st_url' => 'URL',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->urlPercent > 100) {
            \Yii::$app->session->setFlash('error','Суммарное число % не должно превышать 100%');
            return false;
        }

        if (parent::beforeSave($insert)) {
            return true;
        } else {
            return false;
        }
    }

    public static function addCounter($id)
    {
        $model = Stream::findOne(['st_id' => $id]);
        $model->st_cnt += 1;
        $model->save(false);
    }

    protected function getUrlPercent()
    {
        $percent = (new \yii\db\Query())
            ->select(['sum(url_rot)'])
            ->from('url')
            ->where(['st_id' => $this->st_id])
            ->scalar();
        return $percent;
    }

}
