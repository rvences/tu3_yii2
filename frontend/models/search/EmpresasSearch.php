<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Empresas;

/**
 * EmpresasSearch represents the model behind the search form about `frontend\models\Empresas`.
 */
class EmpresasSearch extends Empresas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idempresas', 'user_id', 'tipo_cliente_id'], 'integer'],
            [['status', 'cabeza_sector', 'cuenta', 'siglas', 'nat_juridica', 'categoria', 'subcuenta'], 'safe'],
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
        $query = Empresas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idempresas' => $this->idempresas,
            'user_id' => $this->user_id,
            'tipo_cliente_id' => $this->tipo_cliente_id,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'cabeza_sector', $this->cabeza_sector])
            ->andFilterWhere(['like', 'cuenta', $this->cuenta])
            ->andFilterWhere(['like', 'siglas', $this->siglas])
            ->andFilterWhere(['like', 'nat_juridica', $this->nat_juridica])
            ->andFilterWhere(['like', 'categoria', $this->categoria])
            ->andFilterWhere(['like', 'subcuenta', $this->subcuenta]);

        return $dataProvider;
    }
}
