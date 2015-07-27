<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Personas;

/**
 * PersonasSearch represents the model behind the search form about `frontend\models\Personas`.
 */
class PersonasSearch extends Personas
{
    public $cuenta;
    public $categoria;
    public $subcuenta;
    public $cabeza_sector;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpersonas', 'empresas_id'], 'integer'],
            [['cargo', 'nombre', 'telefono', 'email', 'direccion', 'asistente', 'fecha_reunion',
            // Agregando los campos de Empresa
                'cuenta',

            ], 'safe'],
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
        $query = Personas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes'=> [
                'cuenta' => [
                    'asc'=>['cuenta'=>SORT_ASC],
                    'desc'=>['cuenta'=>SORT_DESC],
                    'label'=>'Empresa'
                ]
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');

            // Join con Empresa
            $query->joinWith(['empresa']);


            return $dataProvider;
        }

        $query->andFilterWhere([
            'idpersonas' => $this->idpersonas,
            'empresas_id' => $this->empresas_id,
            'fecha_reunion' => $this->fecha_reunion,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'cargo', $this->cargo])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'asistente', $this->asistente]);


        // Filtro por empresa
        $query->joinWith(['empresas' => function ($q) {
            $q->where('empresas.cuenta LIKE "%' . $this->cuenta . '%"');
        }]);

        return $dataProvider;
    }
}
