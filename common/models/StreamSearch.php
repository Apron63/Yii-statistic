<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Stream;

/**
 * StreamSearch represents the model behind the search form about `common\models\Stream`.
 */
class StreamSearch extends Stream
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['st_id', 'pr_id'], 'integer'],
            [['st_name', 'st_cnt', 'st_url'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $this->load($params);

        $query = Stream::find()->where(['pr_id' => $params['id']]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        //$this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'st_id' => $this->st_id,
            'pr_id' => $this->pr_id,
        ]);

        $query->andFilterWhere(['like', 'st_name', $this->st_name]);

        return $dataProvider;
    }
}
