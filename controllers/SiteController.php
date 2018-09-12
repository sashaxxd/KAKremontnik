<?php

namespace app\controllers;

use app\models\ChangePassword;
use app\models\PasswordResetRequest;
use app\models\ResetPassword;
use app\models\Signup;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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
//                    'logout' => ['post'],
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
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {

            $message = Yii::$app->user->identity->username . " здравствуйте, вы успешно авторизировались на сайте";
            Yii::$app->session->setFlash('success', "$message");
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    public function actionSignup()
    {
        $model = new Signup();
        if ($model->load(Yii::$app->getRequest()->post())) {
//            Debug(Yii::$app->getRequest()->post());
            $random  = Yii::$app->getRequest()->post('Signup')['email'];
            $model->email_confirm_token = md5(uniqid($random , true));
            if ($user = $model->signup()) {
//                return $this->goHome();
                /**
                 * Отправляем на почту ссылку для подтверждения регистрации используем метод - sentEmailConfirm($user)
                 */
              $this->sentEmailConfirm($user);



                return $this->goHome();
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Отправляем сообщение
     */
    private function sentEmailConfirm($user)
    {
        $email = $user->email;

        $sent = Yii::$app->mailer
            ->compose(
                ['html' => 'user-signup-comfirm-html', 'text' => 'user-signup-comfirm-text'],
                ['user' => $user])
            ->setTo($email)
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setSubject('Подтверждение регистрации на сайте - Cпециалист.ру')
            ->send();

        if (!$sent) {
            Yii::$app->session->setFlash('error', "Проверьте адрес электронной почты и повторите регистрацию");
        }
        else{
            Yii::$app->session->setFlash('success', "На ваш Email отправленно письмо для подтврждения регистации");
        }
    }

    /**
     * Второй шаг регистрации - окно с уведомлением что письмецо отпавленно для подтверждения
     */
    public function actionSignupStep2()
    {


        return $this->render('signup-step2', [

        ]);
    }
    /**
     * На этот экшен кидает с почты
     */
    public function  actionSignupConfirm(){

           $token = Yii::$app->request->get()['token'];
           $this->confirmation($token);

            return $this->goHome();
       }

    /**
     * Проверяем токен и авторизируем пользователя
     */
    private function confirmation($token)
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token.');
        }

        $user = User::findOne(['email_confirm_token' => $token]);

        if (!$user) {
            throw new \DomainException('User is not found.');
        }


        $user->email_confirm_token = null;
        $user->status = User::STATUS_ACTIVE;



        if (!$user->save()) {
            throw new \RuntimeException('Saving error.');
        }

        if (!Yii::$app->getUser()->login($user)){
            throw new \RuntimeException('Error authentication.');
        }
        else{
            $message = Yii::$app->user->identity->username . " здравствуйте ваш Email подтвержден, вы успешно авторизировались на сайте";
            Yii::$app->session->setFlash('success', "$message");
            return $this->redirect(['index']);
        }


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
     * Изменить пароль
     */

    public function actionChangePassword()
    {
        $model = new ChangePassword();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->change()) {
            return $this->goHome();
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }



    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPassword($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'Новый пароль сохранен вы можете войти.');

            return $this->redirect(['login']);
        }

        return $this->render('reset-password', [
            'model' => $model,
        ]);
    }


    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequest();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'На вашу почту отправленна инструкция по смене пароля');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Такого емейла нет в базе.');
            }
        }

        return $this->render('request-password-reset', [
            'model' => $model,
        ]);
    }
}


