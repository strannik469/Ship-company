<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Workers;
use app\models\Login;
use app\models\Posts;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    public function actionIndex()
    {
        return $this->render('index');
    }

  /*  public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
*/
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

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

    public function actionAbout()
    {
        return $this->render('about');
    }
	
	public function actionWorkers()
    {
        $var = 'Список сотрудников';
		
		$array = Workers::getAll();
		
		return $this->render('workers',['varInView'=>$var,'arrayInView'=>$array]);
    }
	
	public function actionView($id) {
		
		$one = Workers::getOne($id);
		return $this->render('view', ['one'=>$one]);
	}
	
	public function actionLogin() {
		
		$login_model = new Login();
		
		if(Yii::$app->request->post('Login')){
			
			$login_model->attributes = Yii::$app->request->post('Login');	
			
			if ($login_model->validate()) {
				var_dump('Мы прошли валидацию'); die();
			}
		}
		
		return $this->render('login',['login_model'=>$login_model]);
	}
	
	public function actionPosts()
    {
        $var = 'Список должностей';
		
		$array = Posts::getAll();
		
		return $this->render('posts',['varInView'=>$var,'arrayInView'=>$array]);
    }
	
	/*public function actionViewPosts($id) {
		
		$one = Posts::getOne($id);
		return $this->render('view', ['one'=>$one]);
	} */
}
