<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Url;

/**
 * UrlSearch represents the model behind the search form about `common\models\Url`.
 */
class UrlSearch extends Url
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url_id', 'url_rot',], 'integer'],
            [['url_url', 'url_name', 'url_comment', 'st_id'], 'safe'],
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
        $query = Url::find()->where(['st_id' => $params['id']]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'url_id' => $this->url_id,
            'url_rot' => $this->url_rot,
            'st_id' => $this->st_id,
        ]);

        $query->andFilterWhere(['like', 'url_url', $this->url_url])
            ->andFilterWhere(['like', 'url_name', $this->url_name])
            ->andFilterWhere(['like', 'url_comment', $this->url_comment]);

        return $dataProvider;
    }
}
