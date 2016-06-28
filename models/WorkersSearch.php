<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Workers;

/**
 * WorkersSearch represents the model behind the search form about `app\models\Workers`.
 */
class WorkersSearch extends Workers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'firedStatus'], 'integer'],
            [['tabelNumber', 'name', 'idPost', 'surname', 'secondName', 'dateBirthday', 'address', 'telephone', 'telHome', 'telWork'], 'safe'],
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
        $query = Workers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
		
		$query->joinWith('post');
		
		
		

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dateBirthday' => $this->dateBirthday,
            
            'firedStatus' => $this->firedStatus,
        ]);

        $query->andFilterWhere(['like', 'tabelNumber', $this->tabelNumber])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'secondName', $this->secondName])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'telHome', $this->telHome])
            ->andFilterWhere(['like', 'telWork', $this->telWork])
			->andFilterWhere(['like', 'tblPosts.post', $this->idPost]);
            
        return $dataProvider;
    }
}
