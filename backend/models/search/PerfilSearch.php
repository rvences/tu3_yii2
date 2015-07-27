<?php
namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Perfil;

class PerfilSearch extends Perfil
{

    public $userId;


    public function rules()
    {
        return [

            [['id'], 'integer'],
            [['nombre', 'apellido', 'fecha_nacimiento','userId'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */

    public function attributeLabels()
    {
        return [
        ];
    }

    public function search($params)
    {
        $query = Perfil::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'nombre',
                'apellido',
                'fecha_nacimiento',
                'perfilIdLink' => [
                    'asc' => ['perfil.id' => SORT_ASC],
                    'desc' => ['perfil.id' => SORT_DESC],
                    'label' => 'ID'
                ],
                'userLink' => [
                    'asc' => ['user.username' => SORT_ASC],
                    'desc' => ['user.username' => SORT_DESC],
                    'label' => 'User'
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {

            $query->joinWith(['user']);

            return $dataProvider;
        }

        $this->addSearchParameter($query, 'id');
        $this->addSearchParameter($query, 'nombre', true);
        $this->addSearchParameter($query, 'apellido', true);
        $this->addSearchParameter($query, 'fecha_nacimiento');
        $this->addSearchParameter($query, 'created_at');
        $this->addSearchParameter($query, 'updated_at');
        $this->addSearchParameter($query, 'user_id');

// filtrar por usuario

        $query->joinWith(['user' => function ($q) {

                $q->andFilterWhere(['=', 'user.id', $this->user]);

            }]);

        return $dataProvider;
    }

    protected function addSearchParameter($query, $attribute, $partialMatch = false)
    {
        if (($pos = strrpos($attribute, '.')) !== false) {
            $modelAttribute = substr($attribute, $pos + 1);
        } else {
            $modelAttribute = $attribute;
        }

        $value = $this->$modelAttribute;
        if (trim($value) === '') {
            return;
        }

        /*
         * La siguiente línea se agrega para un correcto uso de alias
         * de columnas para que el filtrado funcione en el self join
         */

        $attribute = "perfil.$attribute";

        if ($partialMatch) {
            $query->andWhere(['like', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }

}