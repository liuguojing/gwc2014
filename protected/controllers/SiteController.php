<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = '//layouts/nonav';
		$model = new Query();
		if(isset($_POST['Query'])){
			$model->attributes = $_POST['Query'];
			$model->nature = $this->array2string($model->nature);
			$model->status = 'Pending';
			if($model->save()){
			//	$this->sendMail('tony.chen@magictony-se.com', 'Gartner Winners Circle Query Form No#: '.$model->id, $model,'query_email');
				Yii::app()->user->setFlash('success','Save successful ! ');
				$this->redirect(array('index'));
			}
		}
		$this->render('index',array('model'=>$model));
	}
	
	public function actionDownloadCsv(){
		$querys = Query::model()->findAll();
		$this->layout = '//layouts/export';
		$filename = 'Query_List';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('query_export',array('querys'=>$querys));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		throw new CHttpException(404,'This is a wrong link.');
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	public function actionHotel(){
		$user = new User;
		if(isset($_POST['User'])){
			$email = $_POST['User']['email'];
			if(in_array($email,array('li.he@brightac.com.cn'))){
				echo 'good mail';
			}else{
				echo 'bad mail';
			}
		}
		$this->render('hotel',array('model'=>$user));
	}
}
