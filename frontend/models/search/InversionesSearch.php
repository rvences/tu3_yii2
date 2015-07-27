<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Inversiones;

/**
 * InversionesSearch represents the model behind the search form about `frontend\models\Inversiones`.
 */
class InversionesSearch extends Inversiones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idinversion', 'empresas_id'], 'integer'],
            [['anio', 'monto_propuesta', 'fecha_campana', 'productos_interes', 'comentarios', 'propuesta', 'campana', 'temporalidad'], 'safe'],
            [['inversion'], 'number'],
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
        $query = Inversiones::find();

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
            'idinversion' => $this->idinversion,
            'empresas_id' => $this->empresas_id,
            'anio' => $this->anio,
            'inversion' => $this->inversion,
            'fecha_campana' => $this->fecha_campana,
        ]);

        $query->andFilterWhere(['like', 'monto_propuesta', $this->monto_propuesta])
            ->andFilterWhere(['like', 'productos_interes', $this->productos_interes])
            ->andFilterWhere(['like', 'comentarios', $this->comentarios])
            ->andFilterWhere(['like', 'propuesta', $this->propuesta])
            ->andFilterWhere(['like', 'campana', $this->campana])
            ->andFilterWhere(['like', 'temporalidad', $this->temporalidad]);

        return $dataProvider;
    }
}
