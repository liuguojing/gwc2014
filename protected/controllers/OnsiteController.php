<?php

class OnsiteController extends Controller
{
	public $layout='//layouts/report';
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
						'actions'=>array('index','search','checkin','gift','ipad','guestGift',
								'searchGift','guestCheckin','searchIpad','ipad','save'),
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	public function actionIndex(){
		
		$this->redirect(array('search'));
	}
	
	public function actionSearch(){
		
		if(isset($_POST['User']['id'])){
			$isGuest = 0;
			if(strpos($_POST['User']['id'],'G')){
				$isGuest = 1;
				$id = substr($_POST['User']['id'],1,strlen($_POST['User']['id'])-2);
				$model = Guest::model()->findByAttributes(array('user_id'=>$id));
			}else{
				$id = substr($_POST['User']['id'],1,strlen($_POST['User']['id'])-1);
				$model = User::model()->findByPk($id);
			}
			if($model === null){
				Yii::app()->user->setFlash('error','Can not find the code.');
			}else{
				if($model->has_checkin == 1){
					$this->render('has_checkin',array('model'=>$model));
					Yii::app()->end();
				}else{
					if($isGuest == 0){
						$this->redirect(array('checkin','id'=>$model->id));
					}else{
						$this->redirect(array('guestCheckin','id'=>$model->id));
					}
				}
			}
		}
		
		if(empty($model))
			$model = new User();
		$this->render('search',array('model'=>$model));
	}
	public function actionSearchGift(){
	
		if(isset($_POST['User']['id'])){
			$isGuest = 0;
			if(strpos($_POST['User']['id'],'G')){
				$isGuest = 1;
				$id = substr($_POST['User']['id'],1,strlen($_POST['User']['id'])-2);
				$model = Guest::model()->findByAttributes(array('user_id'=>$id));
			}else{
				$id = substr($_POST['User']['id'],1,strlen($_POST['User']['id'])-1);
				$model = User::model()->findByPk($id);
			}
			if($model === null){
				Yii::app()->user->setFlash('error','Can not find the code.');
			}else{
				if($model->has_gift == 1){
					$this->render('has_gift',array('model'=>$model));
					Yii::app()->end();
				}else{
					if($isGuest == 0){
						$this->redirect(array('gift','id'=>$model->id));
					}else{
						$this->redirect(array('guestGift','id'=>$model->id));
					}
				}
			}
		}
	
		if(empty($model))
			$model = new User();
		$this->render('search_gift',array('model'=>$model));
	}
	public function actionCheckin($id)
	{
		$model = User::model()->with('guest')->findByPk($id);
		if($model === null){
			throw CHttpException('404','User not found.');
		}
		if($model->has_checkin == 1){
			$this->render('has_checkin',array('model'=>$model));
			Yii::app()->end();
		}else{
			if(isset($_POST['User'])){
				$model->setScenario('checkin');
				$model->attributes=$_POST['User'];
				$model->has_checkin = 1;
				$model->checkin_at = new CDbExpression('NOW()');
				if($model->save()){
					Yii::app()->user->setFlash('success',$model->first_name . ' ' . $model->last_name . ' Checkin.');
					unset($model->id);
					$this->redirect(array('search'));
					Yii::app()->end();
				}else{
					Yii::app()->user->setFlash('error','Can not save.');
				}
			}
		}
		$this->render('checkin',array('model'=>$model));
	}
	public function actionGuestCheckin($id)
	{
		$model = Guest::model()->with('user')->findByPk($id);
		if($model === null){
			throw CHttpException('404','Guest not found.');
		}
		if($model->has_checkin == 1){
			$this->render('guest_has_checkin',array('model'=>$model));
			Yii::app()->end();
		}else{
			if(isset($_POST['Guest'])){
				$model->setScenario('checkin');
				$model->attributes=$_POST['Guest'];
				$model->has_checkin = 1;
				if($model->save()){
					Yii::app()->user->setFlash('success','Success.');
					unset($model->id);
					$this->redirect(array('search'));
					Yii::app()->end();
				}else{
					var_dump($model->getErrors());
					Yii::app()->user->setFlash('error','Can not save.');
				}
			}
		}
	
		$this->render('guest_checkin',array('model'=>$model));
	}
	public function actionGuestGift($id)
	{
		$model = Guest::model()->with('user')->findByPk($id);
		if($model === null){
			throw CHttpException('404','Guest not found.');
		}
		if($model->has_gift == 1){
			$this->render('has_gift',array('model'=>$model));
			Yii::app()->end();
		}else{
			if(isset($_POST['Guest'])){
				$model->setScenario('checkin');
				$model->attributes=$_POST['Guest'];
				$model->has_gift = 1;
				$model->gift_at = new CDbExpression('NOW()');
				if($model->save()){
					Yii::app()->user->setFlash('success','Success.');
					unset($model->id);
					$this->redirect(array('searchGift'));
					Yii::app()->end();
				}else{
					Yii::app()->user->setFlash('error','Can not save.');
				}
			}
		}
	
		$this->render('guest_gift',array('model'=>$model,'gifts'=>Gift::model()->getGiftsByType($model->user->type)));
	}

	public function actionGift($id)
	{
		$model = User::model()->findByPk($id);
		if($model === null){
			throw CHttpException('404','User not found.');
		}
		if($model->has_gift == 1){
			$this->render('has_gift',array('model'=>$model));
			Yii::app()->end();
		}else{
			if(isset($_POST['User'])){
				$model->setScenario('checkin');
				$model->attributes=$_POST['User'];
				$model->has_gift = 1;
				$model->gift_at = new CDbExpression('NOW()');
				if($model->save()){
					Yii::app()->user->setFlash('success','Success.');
					unset($model->id);
					$this->redirect(array('searchGift'));
					Yii::app()->end();
				}else{
					var_dump($model->getErrors());
					Yii::app()->user->setFlash('error','Can not save.');
				}
			}
		}
		$this->render('gift',array('model'=>$model,'gifts'=>Gift::model()->getGiftsByType($model->type)));
	}

	public function actionIpad($id)
	{
		$model = User::model()->findByPk($id);
		if($model === null){
			throw CHttpException('404','User not found.');
		}
		if(isset($_POST['User'])){
			$model->setScenario('checkin');
			$coupon = $model->coupon;
			$travel_ticket = $model->travel_ticket;
			$guest_coupon = $model->guest_coupon;
			$guest_travel_ticket = $model->guest_travel_ticket;
			$model->attributes = $_POST['User'];
			$model->coupon = $coupon==1?1:$this->array2string($model->coupon);
			$model->travel_ticket = $travel_ticket==1?1:$this->array2string($model->travel_ticket);
		    $model->guest_coupon = $guest_coupon == 1?1:$this->array2string($model->guest_coupon);
			$model->guest_travel_ticket = $guest_travel_ticket == 1?1:$this->array2string($model->guest_travel_ticket);
			if($model->has_ipad!=1){
				$model->ipad_at = new CDbExpression('NOW()');
				$model->ipad_by = Yii::app()->user->name;
			}
			$model->has_ipad = 1;
			$model->ipadupdated_at = new CDbExpression('NOW()');
			$model->ipadupdated_by = Yii::app()->user->name;
			$model->save();
			$this->redirect(array('searchIpad'));
		}
		$model->coupon = $this->string2array($model->coupon);
		$model->travel_ticket = $this->string2array($model->travel_ticket);
		$model->guest_coupon = $this->string2array($model->guest_coupon);
		$model->guest_travel_ticket = $this->string2array($model->guest_travel_ticket);
		$this->render('ipad',array('model'=>$model));
	}
	
	public function actionSearchIpad(){
	
		if(isset($_POST['User']['id'])){
			$id = '1' . $_POST['User']['id'];
			$model = User::model()->findByPk($id);
			if($model === null){
				Yii::app()->user->setFlash('error','Can not find the code.');
			}else{
				$this->redirect(array('ipad','id'=>$model->id,'#'=>'ipad'));
			}
		}
	
		if(empty($model))
			$model = new User();
		$this->render('search_ipad',array('model'=>$model));
	}
	public function actionSave(){
		if(!isset($_POST['User']['id'])){
			echo 'error';
			Yii::app()->end();
		}
		$model = User::model()->findByPk($_POST['User']['id']);
		if($model === null){
			echo 'error';
			Yii::app()->end();
		}
		if($model->has_ipad == 1){
			echo 'has_ipad';
			Yii::app()->end();
		}
		$model->setScenario('checkin');
		$model->attributes = $_POST['User'];
	    $model->coupon = $this->array2string($model->coupon);
		$model->travel_ticket = $this->array2string($model->travel_ticket);
	    $model->guest_coupon = $this->array2string($model->guest_coupon);
		$model->guest_travel_ticket = $this->array2string($model->guest_travel_ticket);
		$model->has_ipad = 1;
		$model->ipad_by = Yii::app()->user->name;
		$model->ipad_at = new CDbExpression('NOW()');
		$image = base64_decode($model->img);
		try{
			$filename = Yii::app()->basePath . '/../uploads/' . $model->id . '.png';
			$fp=fopen($filename,'w');
			fwrite($fp,$image);
			fclose($fp);
		}catch (Exception $e){
			echo 'Error: can not save file.';
			Yii::app()->end();
		}
		if($model->save()){
			echo 'Success';
		}else{
			var_dump($model->getErrors());
			echo 'Can not save.';
		}
		Yii::app()->end();
	}

}