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
		$spaltennamen2 = Funktion::model()->getTableSchema()->getColumnNames();
                $spaltennamen = Funktion::model()->attributeLabelsIndexAreNumbers();
                $grobphase = new Grobphase;
                $unterphase = new Unterphase;
		
		//Aufruf der get-Methoden der jeweiligen Models
		$modelGrobphase = Grobphase::model()->getAttr();
		$modelUnterphase = Unterphase::model()->getAttr();
		$modelFunktion = array();
		$modelFunktion["name"] = Funktion::model()->getNames();
		$modelFunktion["profmb"] = Funktion::model()->getOptionsProfMitBeratung();
		$modelFunktion["hsr_aktuell"] = Funktion::model()->getOptionsHSRAktuell();
		$modelFunktion["hsr_zukuenftig"] = Funktion::model()->getOptionsHSRZukuenftig();
		
		//Zuweisung dieser in $model2, $model2[0]["filter"] ist das Model f�r den Filter selbst... k�nnen wir wohl rausnehmen, $model2[1][...] sind die Options f�r die Filterung
		$model2[0]["filter"]=$filter;
		$model2[1]["grobphase"]=$modelGrobphase;
		$model2[1]["unterphase"]=$modelUnterphase;
		$model2[1]["name"]= $modelFunktion["name"];
		$model2[1]["profmb"]= $modelFunktion["profmb"];
		$model2[1]["privmb"] = $modelFunktion["profmb"];
		$model2[1]["profob"] = $modelFunktion["profmb"];
		$model2[1]["privob"] = $modelFunktion["profmb"];
		$model2[1]["rausfg"] = $modelFunktion["profmb"];
		$model2[1]["hsra"] =$modelFunktion["hsr_aktuell"];
		$model2[1]["hsrz"] = $modelFunktion["hsr_zukuenftig"];
		
		if(isset($_POST['form_grobphase']))
		{
			
			//Zuweisung der Formulareingaben
			$fil_grobphase = $_POST['form_grobphase'];
			$fil_unterphase = $_POST['form_unterphase'];
			$fil_name = $_POST['form_name'];
			$fil_profmb = $_POST['form_profmb'];
			$fil_privmb = $_POST['form_privmb'];
			$fil_profob = $_POST['form_profob'];
			$fil_privob = $_POST['form_privob'];
			$fil_rausfg = $_POST['form_rausfg'];
			$fil_hsra = $_POST['form_hsra'];
			$fil_hsrz = $_POST['form_hsrz'];
			
			
			//Pr�fung, ob Eingaben leer waren, falls leer werden in einem Buffer alle M�glichkeiten gespeichert
			if($fil_grobphase==""){
					$fil2= Grobphase::model()->getCount();
					for($i=0;$i<$fil2;$i++){
						$fil_grobphase .= $i.",";
					}
					$fil_grobphase=substr($fil_grobphase, 0, -1);
			}
			if($fil_unterphase==""){
				$fil2= Unterphase::model()->getCount();
				for($i=0;$i<$fil2;$i++){
					$fil_unterphase .= $i.",";
				}
				$fil_unterphase = substr($fil_unterphase, 0, -1);
			}
			if($fil_name==""){
				$fil2= Funktion::model()->getCount();
				for($i=0;$i<$fil2;$i++){
					$fil_name .= $i.",";
				}
				$fil_name = substr($fil_name, 0, -1);
			}
			if($fil_privmb==""){
				$fil2= Funktion::model()->getOptionsProfMitBeratung();
				for($i=0;$i<count($fil2);$i++){
					$fil_privmb .= "'".$fil2[$i]."',";
				}
				$fil_privmb = substr($fil_privmb, 0, -1);
			}
			if($fil_profmb==""){
				$fil2= Funktion::model()->getOptionsProfMitBeratung();
				for($i=0;$i<count($fil2);$i++){
					$fil_profmb .= "'".$fil2[$i]."',";
				}
				$fil_profmb = substr($fil_profmb, 0, -1);
			}
			if($fil_privob==""){
				$fil2= Funktion::model()->getOptionsProfMitBeratung();
				for($i=0;$i<count($fil2);$i++){
					$fil_privob .= "'".$fil2[$i]."',";
				}
				$fil_privob = substr($fil_privob, 0, -1);
			}
			if($fil_profob==""){
				$fil2= Funktion::model()->getOptionsProfMitBeratung();
				for($i=0;$i<count($fil2);$i++){
					$fil_profob .= "'".$fil2[$i]."',";
				}
				$fil_profob = substr($fil_profob, 0, -1);
			}
			if($fil_rausfg==""){
				$fil2= Funktion::model()->getOptionsProfMitBeratung();
				for($i=0;$i<count($fil2);$i++){
					$fil_rausfg .= "'".$fil2[$i]."',";
				}
				$fil_rausfg = substr($fil_rausfg, 0, -1);
			}
			if($fil_hsra==""){
				$fil2= Funktion::model()->getOptionsHSRAktuell();
				for($i=0;$i<count($fil2);$i++){
					$fil_hsra .= "'".$fil2[$i]."',";
				}
				$fil_hsra = substr($fil_hsra, 0, -1);
			}
			if($fil_hsrz==""){
				$fil2= Funktion::model()->getOptionsHSRZukuenftig();
				for($i=0;$i<count($fil2);$i++){
					$fil_hsrz .= "'".$fil2[$i]."',";
				}
				$fil_hsrz = substr($fil_hsrz, 0, -1);
			}
			
			//SQL-SubStrings f�r alle Filter: sucht alle Werte der Spalten, die im jeweiligen Buffer enthalten sind
			$fil[0] = "grobphase_id IN ($fil_grobphase)";
			$fil[1] = "unterphase_id IN ($fil_unterphase)";
			$fil[2] = "nummer IN ($fil_name)";
			$fil[3] = "priv_mit_beratung IN ($fil_privmb)";
			$fil[4] = "prof_mit_beratung IN ($fil_profmb)";
			$fil[5] = "priv_ohne_beratung IN ($fil_privob)";
			$fil[6] = "prof_ohne_beratung IN ($fil_profob)";
			$fil[7] = "r_ausf_geschaeft IN ($fil_rausfg)";
			$fil[8] = "hsr_aktuell IN ($fil_hsra)";
			$fil[9] = "hsr_zukuenftig IN ($fil_hsrz)";
			$sql ="SELECT * FROM funktion WHERE ";
			
			//Zusammensetzen der SQL-Abfrage
			for($i=0;$i<count($fil);$i++){
				$sql .=$fil[$i]." AND ";
				}
				
				//Wegnehmen des letzten "AND "
				$sql = substr($sql, 0, -4);
				$funktion = Funktion::model()->findAllBySql("$sql");
				//Zuweisung von "leer", wenn keine Funktion die Kriterien erf�llt, wird in neu.php abgefragt.
				if(empty($funktion[0]["id"])){
					$funktion[0]["id"]="leer";
					}
				$grobphase = Grobphase::model()->findAllBySql("SELECT * FROM grobphase");
                                $unterphase = Unterphase::model()->findAllBySql("SELECT * FROM unterphase");
                                //$funktion = Funktion::model()->findAllByAttributes(array('grobphase_id'=>$filter->grobphase_id));
			
			$this->render('neu',array('unterphase'=>$unterphase,'fil'=>$sql,'model'=>$funktion, 'model2' =>$model2, 'model3' =>$funktion, 'model4' => $fil_grobphase, 'name' => $fil_name, 'hsrz' => $fil_hsrz, 'hsra' => $fil_hsra, 'privob' => $fil_privob, 'profob' => $fil_profob, 'rausfg' => $fil_rausfg,'unterphase' => $fil_unterphase, 'privmb' => $fil_privmb, 'profmb' => $fil_profmb, 'model6' => $spaltennamen, 'model5' => $spaltennamen2, 'grobphase' => $grobphase,));
		}
		else{
		$model = array($funktion,$filter,);
		$this->render('neu',array('model'=>$funktion, 'model2' =>$model2, 'model6' => $spaltennamen, 'model5' => $spaltennamen2));
		}
	}
        
         public function actionDetails($fktNr){
            $fktNr = (int)($fktNr);
            //$fktNr = 3;
            $funktionsdaten = Funktion::model()->getRowByNumber($fktNr);
            $this->render('details', array('funktionsdaten'=>$funktionsdaten));
        }
}