<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TPesanan;
use yii\data\ArrayDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSpeak($message = "default message")
    { 
        return $this->render("speak",['message' => $message]); 
    }

    public function actionTestWidget() 
    { 
        return $this->render('testwidget'); 
    }

    public function actionGetTableData()
    {
        $urltofetchdata = "https://dummyjson.com/products"; //i expect to return json
        $datas = json_decode(file_get_contents($urltofetchdata));

        $dataProvider = new ArrayDataProvider([
            'allModels' => $datas->products,
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->renderAjax("_getdata", ['dataProvider' => $dataProvider]);
    }

    public function actionShowData() 
    {
        $dataProvider = new ArrayDataProvider([
            'allModels' => array(),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('showdata', ['dataProvider' => $dataProvider]);
    }

    public function actionGetProductDetail($id)
    {
        $urltofetchdata = "https://dummyjson.com/products/".$id;
        $data = json_decode(file_get_contents($urltofetchdata));

        return $this->render("getproductdetail", ['data' => $data]);
    }

    public function actionAddProduct()
    {
        $model = new TPesanan();
        if ($model->load(Yii::$app->request->post())) {
            // insert ??
            Yii::$app->db->createCommand()->insert('t_pesanan', [
                'no_pesanan' => $model->no_pesanan,
                'tanggal' => $model->tanggal,
                'nm_supplier' => $model->nm_supplier,
                'nm_produk' => $model->nm_produk,
                'total' => $model->total
            ])->execute();

            return $this->refresh();
        }
        return $this->render('addproduct', [
            'model' => $model,
        ]);
    }
}
