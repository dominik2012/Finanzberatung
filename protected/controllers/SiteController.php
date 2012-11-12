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
		$this->render('index');
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
	
	public function actionNeu()
	{
		$funktion = new Funktion;
		$filter = new NeuForm;
		$spaltennamen = Funktion::model()->getTableSchema()->getColumnNames();
		if(isset($_POST['NeuForm']))
		{
			
			$filter->grobphase_id = $_POST['NeuForm'];
			$filter2 = "0 ";
			$filter3 = $filter->getId();
			if(isset($filter3["grobphase_id"][0])){
			$filter2 ="";
			for($i=0;$i<sizeof($filter3["grobphase_id"]);$i++){
			$filter2 .= $filter3["grobphase_id"][$i].",";
			}
			}
			$filter2=substr($filter2, 0, -1);
			//$filter2 = $filter->grobphase_id;
			$funktion = Funktion::model()->findAllBySql("SELECT * FROM funktion WHERE grobphase_id IN ($filter2)");
			//$funktion = Funktion::model()->findAllByAttributes(array('grobphase_id'=>$filter->grobphase_id));
			
			$this->render('neu',array('model'=>$funktion, 'model2' =>$filter, 'model3' =>$funktion, 'model4' => $filter2, 'model5' => $spaltennamen));
		}
		else{
		$model = array($funktion,$filter,);
		$this->render('neu',array('model'=>$funktion, 'model2' =>$filter, 'model5' => $spaltennamen));
		}
	}
}