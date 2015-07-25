<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Perfil;
use frontend\models\search\PerfilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;

/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'], // @ = logueado
                        // Tambien funciona en lugar de access2
                        //'matchCallback' => function ($rule, $action) {
                        //    return PermisosHelpers::requerirEstado('Activo'); }
                    ],

                ],
            ],
            'access2' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'], // @ = logueado
                        // matchCall espera solo valor verdadero o falso
                        'matchCallback' => function ($rule, $action) {
                            return PermisosHelpers::requerirEstado('Activo'); }
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Realiza lo mismo que la acción view
     * @return mixed
     */
    public function actionIndex()
    {
        /* En caso de no extraer la lógica del controlador se escribe algo así
        if($ya_existe_perfil = Perfil::find()->where(['user_id' => Yii::$app->user->identity->id])->one()) {
            return $this->render('view', [
                'model' => $this->findModel($ya_existe_perfil->id),
            ]);}
        */
        if ($ya_existe_perfil = RegistrosHelpers::userTiene('perfil')) {
            // Si ya existe elperfil del usuario lo redirecciona para que lo pueda visualizar
            return $this->render('view', [
                'model' => $this->findModel($ya_existe_perfil),
            ]);
        } else {
            // Redirecciona para que se capture la información
            return $this->redirect(['create']);

        }
        /*
        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        */
    }

    /**
     * Redirecciona para crear o mostrar el perfil del usuario logueado
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        if ($ya_existe_perfil = RegistrosHelpers::userTiene('perfil')) {
            // Si ya existe elperfil del usuario lo redirecciona para que lo pueda visualizar
            return $this->render('view', [
                'model' => $this->findModel($ya_existe_perfil),
            ]);
        } else {
            // Redirecciona para que se capture la información
            return $this->redirect(['create']);

        }
    }

    /**
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Perfil;
        // Se guarda el atributo de user_id en el modelo para que no sea enviado vía POST por el formulario
        $model->user_id = \Yii::$app->user->identity->id;
        if ($ya_existe = RegistrosHelpers::userTiene('perfil')) {
            return $this->render('view', [
                'model' => $this->findModel($ya_existe),
            ]);
        // Si no existe el perfil, trata de guardar la información enviada vía POST
        } elseif ($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect(['view']);
        // Si hubo error o no hay datos para enviar se muestra el formulario
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        /*
        $model = new Perfil();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        // if($model = RegistrosHelpers::userTiene('perfil'))
        // Obtiene el registro del perfil del usuario
        if($model =  Perfil::find()->where(['user_id' => Yii::$app->user->identity->id])->one()) {
            // Si existe el perfil del usuario obtiene los datos del formulario y lo actualiza.
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view']);
            } else {
                // Si no se envio datos, se muestra el formulario con la información de la BD
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        } else {
            throw new NotFoundHttpException('No Existe el Perfil.');
        }
        /*
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
    }

    /**
     * Deletes an existing Perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model =  Perfil::find()->where(['user_id' => Yii::$app->user->identity->id])->one();
        $this->findModel($model->id)->delete();
        // Si se deja solo redirect(['index']) el controlador redireccionará a perfil/index
        return $this->redirect(['site/index']);
        /*
        $this->findModel($id)->delete();

        return $this->redirect(['index']);*/
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
