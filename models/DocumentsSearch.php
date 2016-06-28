<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Documents;

/**
 * DocumentsSearch represents the model behind the search form about `app\models\Documents`.
 */
class DocumentsSearch extends Documents
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['series', 'number', 'idWorkers', 'idType', 'dateOfIssue', 'dateEnd', 'issuedBy'], 'safe'],
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
        $query = Documents::find();

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

		$query->joinWith('type');
		
		$query->joinWith('surname');
		
		
		// grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'idType' => $this->idType,
            'dateOfIssue' => $this->dateOfIssue,
            'dateEnd' => $this->dateEnd,
            //'idWorkers' => $this->idWorkers,
        ]);

        $query->andFilterWhere(['like', 'series', $this->series])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'issuedBy', $this->issuedBy])
			->andFilterWhere(['like', 'tblDocumentsTypes.type', $this->idType])
			->andFilterWhere(['like', 'tblWorkers.surname', $this->idWorkers]);
			

        return $dataProvider;
    }
}
