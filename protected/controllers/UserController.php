<?php

class UserController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'HistoryControl + winner,travel,hotel,tours,summary',
				//'postOnly + delete', // we only allow deletion via POST request
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
						'actions'=>array('welcome','decline','visa','teamdinnermenu','galadinnermenu','emailSummary','create','emailDinner','dinnerEmail','hotelEmail','FinEmail','VisaEmail','RemEmail'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('winner','travel','hotel','tours','summary','crew','complete','dinner','finalize'),
						'users'=>array('@'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('admin','create','update','view','index','delete','email','batchSend','guestdelete'),
						'users'=>array('@'),
						'expression' => '$user->isAdmin && ($user->name=="Caroline" || $user->name=="Dickie"|| $user->name=="onsite"|| $user->name=="Tony"|| $user->name=="Jem")'
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('create','update','index','view','admin','delete','guestdelete'),
						'users'=>array('admin'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	public function filterHistoryControl($filterChain)  
	{         
		$model = $this->loadModel(Yii::app()->user->id);
		if($model->status==1){
			throw new CHttpException('Please use the link in invitation letter to begin the registration.');
		}
        $filterChain->run();  
	}
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->layout = '//layouts/admin';
		$model = $this->loadModel($id);
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		$this->render('view',array('model'=>$model,'guest'=>$guest));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->layout = '//layouts/admin';
		$model=new User;
		$guest = new Guest;
		$guest->user_id = $model->id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Guest'])){
			$guest->attributes = $_POST['Guest'];
		}
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->checkSave =false;
			if($model->isNewRecord){
				$checkUser = User::model()->findByAttributes(array('email'=>$model->email));
				if($checkUser===null){
					if(in_array($model->type,array('Top Achievers','Eagles','Operating Committee'))){
						$minDate = 'Apr/09/2014';
						$maxDate = "Apr/14/2014";
					}else{
						$minDate = 'Apr/10/2014';
						$maxDate = "Apr/14/2014";
					}
					$model->departure_date = $minDate;
					$model->return_date = $maxDate;
					$model->hotel_arrival_date = $minDate;
					$model->hotel_departure_date = $maxDate;

					if($model->save()){
						if(isset($_POST['Guest'])){
							$guest->departure_date = $minDate;
							$guest->return_date = $maxDate;
							$guest->hotel_arrival_date = $minDate;
							$guest->hotel_departure_date = $maxDate;
							if($guest->save())
								$this->redirect(array('view','id'=>$model->id));
						}
					}
				}else{
					Yii::app()->user->setFlash('warning','Duplicate email');
				}
			}else{
				if($model->save()){
					if($_POST['Gueest']){
						if($guest->save())
							$this->redirect(array('view','id'=>$model->id));
					}
				}
			}
		}

		$this->render('superUpdate',array(
				'model'=>$model,'guest'=>$guest,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->layout = '//layouts/admin';
		$model = $this->loadModel($id);
		$model->setScenario('search');
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		$guest->setScenario('search');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Guest'])){
			$guest->attributes = $_POST['Guest'];
		}
		if(isset($_POST['User']))
		{
				
			$model->attributes=$_POST['User'];
			$model->previous_winners = $this->array2string($model->previous_winners);
			$model->checkSave =false;
			$guest->checkSave =false;
			$model->coupon = $this->array2string($model->coupon);
			$model->travel_ticket = $this->array2string($model->travel_ticket);
			$model->guest_coupon = $this->array2string($model->guest_coupon);
			$model->guest_travel_ticket = $this->array2string($model->guest_travel_ticket);
			$model->no_gala_dinner = $this->array2string($model->no_gala_dinner);
			if($model->headset == ''){
				$model->has_gift = 0;
			}else{
				$model->has_gift = 1;
			}
			if($model->save()){
				if($model->has_guest == 1 && isset($_POST['Guest'])){
					$guest->setScenario('checkin');
					if($guest->headset == ''){
						$guest->has_gift = 0;
					}else{
						$guest->has_gift = 1;
					}
					$guest->no_gala_dinner = $this->array2string($guest->no_gala_dinner);
					if($guest->save()){
						$this->redirect(array('view','id'=>$model->id));
					}else{
						var_dump($guest->getErrors());
					}
				}else{
					$this->redirect(array('view','id'=>$model->id));
				}
			}
		}
		$model->previous_winners = $this->string2array($model->previous_winners);
		$model->coupon = $this->string2array($model->coupon);
		$model->travel_ticket = $this->string2array($model->travel_ticket);
		$model->guest_coupon = $this->string2array($model->guest_coupon);
		$model->guest_travel_ticket = $this->string2array($model->guest_travel_ticket);
		$model->no_gala_dinner = $this->string2array($model->no_gala_dinner);
		$guest->no_gala_dinner = $this->string2array($guest->no_gala_dinner);
		$this->render('superUpdate',array(
				'model'=>$model,'guest'=>$guest,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
	    $this->actionGuestDeleteNew($id);
	    $model = $this->loadModel($id);
		$tour_user = TourUser::model()->findAllByAttributes(array('user_id'=>$id));
		$wishlist = Wishlist::model()->findAllByAttributes(array('user_id'=>$id));
		if($wishlist===null)
		{
			
		}else
		{
			foreach($wishlist as $wi)
			{
				$wi->delete();
			}
		}
		if($tour_user===null)
		{
			
		}else
		{
			foreach($tour_user as $tour)
			{
				if($tour->delete())
				{
					if($model->tour_status==1)
					{
						$tour_seat = TourSeat::model()->findByPk($tour->seat_id);
						$tour_seat->optional_seats++;
						$tour_seat->save();
					}
				}
			}
		}
	    $this->loadModel($id)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
public  function actionGuestDeleteNew($id)
    {	
		$model = $this->loadModel($id);
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest===null)
		{
			$guest=array();
		}
		else 
		{
	    Guest::model()->deleteAllByAttributes(array('user_id'=>$model->id));
		 $gwl=WishlistsGuest::model()->findAllByAttributes(array('guest_id'=>$guest->id));
	    if($gwl===null)
	    {
	    	
	    }else 
	    {
	    	foreach ($gwl as $wi)
	    	{
	    		$wi->delete();
	    	}
	    }
	    $tour_guests = TourGuest::model()->with('tour')->findAllByAttributes(array('guest_id'=>$guest->id));
	    
		if($tour_guests === null){
			$result['message'] = 'Error';
			$result['error'] = 'You did not booked this tour';
		}else{
			foreach ($tour_guests as $tour_guest )
			{
			if($tour_guest->delete()){
				if($model->tour_status==1)
				{
					$tour_seat = TourSeat::model()->findByPk($tour_guest->seat_id);
					$tour_seat->optional_seats++;
					$tour_seat->save();
				}
		}
			}
			
		}
	    
		
		}
		
    }
	
    public  function actionGuestDelete($id)
    {	
		$model = $this->loadModel($id);
		$model->has_guest=0;
		$model->checkSave = false;
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest===null)
		{
			$guest=array();
		}
		else 
		{
			
	    Guest::model()->deleteAllByAttributes(array('user_id'=>$model->id));
	    $gwl=WishlistsGuest::model()->findAllByAttributes(array('guest_id'=>$guest->id));
	    if($gwl===null)
	    {
	    	
	    }else 
	    {
	    	foreach ($gwl as $wi)
	    	{
	    		$wi->delete();
	    	}
	    }
	    $tour_guests = TourGuest::model()->with('tour')->findAllByAttributes(array('guest_id'=>$guest->id));
	    
		if($tour_guests === null){
			$result['message'] = 'Error';
			$result['error'] = 'You did not booked this tour';
		}else{
			foreach ($tour_guests as $tour_guest )
			{
				
			if($tour_guest->delete()){
				if($model->tour_status==1)
				{
					$tour_seat = TourSeat::model()->findByPk($tour_guest->seat_id);
					$tour_seat->optional_seats++;
					$tour_seat->save();
				}
		}
			}
			
		}
	    
        $model->save();
		
		}
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->layout = '//layouts/admin';
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout = '//layouts/admin';
		$model=new User('search');
		$comment = Comment::model()->findByPk(1);
		if($comment===null){
			$comment = new Comment;
		}
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];
		if(isset($_POST['Comment'])){
			$comment->attributes = $_POST['Comment'];
			$commnet->id = 1;
			$comment->save();
		}
		$this->render('admin',array(
				'model'=>$model,
				'comment'=>$comment,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionWelcome($email=""){
		if(!$email==""){
			$login = new LoginForm();
			$login->username = $email;
			$user = User::model()->findByAttributes(array('email'=>$email));
			if($user===null){
				throw new CHttpException(404,'The requested page does not exist.');
			}elseif($user->status!=0){
				if($user->status==1){
					$this->layout = '//layouts/nonav';
					$this->render('return_finalized',array('user'=>$user));
					Yii::app()->end();
				}elseif($user->status == 2){
					$this->layout = '//layouts/nonav';
					$this->render('return_decline',array('user'=>$user));
					Yii::app()->end();
				}
			}
			if(!$login->login()){
				throw new CHttpException(404,'The requested page does not exist.');
			}
			//else{
			//$user = User::model()->findByAttributes(array('email'=>$email));
			//@todo summary页面再修改状态
			// 				$user->status = 1;
			// 				$user->save();
			//}
		}
		if($email == "" && Yii::app()->user->isGuest){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$user = User::model()->findByPk(Yii::app()->user->id);
		if($user === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$this->user = $user;
		$this->render('welcome',array('user'=>$user));
	}

	public function actionWinner(){
		$model = $this->loadModel(Yii::app()->user->id);
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}

		$model->setScenario('winner');
		$guest->setScenario('winner');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$nextStep = array('travel');
			if($model->type=='Operating Committee'){
				$nextStep = array('hotel');
			}elseif($model->type=='Crew'){
				$nextStep = array('summary');
			}elseif($model->type=='Gartner Crew'){
				$nextStep = array('summary');
			}
			if(isset(Yii::app()->session['summary'])&&Yii::app()->session['summary']==1){
				$nextStep = array('summary');
			}
			$model->attributes=$_POST['User'];
			$model->previous_winners = $this->array2string($model->previous_winners);
			if(isset($_POST['Guest']))
				$guest->attributes = $_POST['Guest'];
			if($model->save()){
				if($model->has_guest==1){
					if($guest->save()){
						$this->redirect($nextStep);
					}
				}else{
					$this->redirect($nextStep);
				}
			}
		}
		$model->previous_winners = $this->string2array($model->previous_winners);
		$this->render('winner',array('model'=>$model,'guest'=>$guest));
	}

	public function actionTravel(){
		$model = $this->loadModel(Yii::app()->user->id);
		if(empty($model->departure_date))
			$model->departure_date = 'Apr/10/2014';
		if(empty($model->return_date))
			$model->return_date = 'Apr/14/2014';
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		if(empty($guest->departure_date))
			$guest->departure_date = 'Apr/10/2014';
		if(empty($guest->return_date))
			$guest->return_date = 'Apr/14/2014';

		$model->destination_city = 'Sydney';
		$guest->destination_city = 'Sydney';

		$model->setScenario('travel');
		$guest->setScenario('travel');
		if(isset(Yii::app()->session['summary'])&&Yii::app()->session['summary']==1){
			$nextStep = array('summary');
		}else{
			$nextStep = array('hotel');
		}
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->visa_letter=='Yes'){
				$model->visa_status = 'Applying';
			}elseif($model->visa_letter == 'No'){
				$model->visa_status = 'Not Applied';
			}else{
				$model->visa_status = '';
			}
			$guest->attributes = $_POST['Guest'];
				
			if(!empty($model->driving)){
				$model->driving = 1;
				$model->setScenario('driving');
			}else{
				$model->driving = 0;
				if($model->visa_letter == 'Yes'){
					$model->setScenario('travel_visa');
				}
			}
			if($model->has_guest==1){
				if($guest->visa_letter=='Yes'){
					$guest->visa_status = 'Applying';
				}elseif($guest->visa_letter=="No"){
					$guest->visa_status = 'Not Applied';
				}else{
					$guest->visa_status = '';
				}
				if(!empty($guest->driving)){
					$guest->driving = 1;
					$guest->setScenario('driving');
				}else{
					$guest->driving = 0;
					if($guest->visa_letter == 'Yes'){
						$guest->setScenario('travel_visa');
					}
				}
			}
			if($model->save()){
				if($model->has_guest==1){
					if($guest->save()){
						$guest->stringToArray();
						$this->redirect($nextStep);
					}
				}else{
					$this->redirect($nextStep);
				}
				
			}
			$model->stringToArray();
		}
		$this->render('travel',array('model'=>$model,'guest'=>$guest));
	}

	public function actionHotel(){
		$model = $this->loadModel(Yii::app()->user->id);
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		if($model->type=='Operating Committee'){
			$model->setScenario('ochotel');
			$guest->setScenario('ochotel');
		}else{
			$model->setScenario('hotel');
			$guest->setScenario('hotel');
		}
		if(isset($_POST['User']))
		{
			$nextStep = array('tours');
			if($model->type=='Gartner Crew'||$model->type=='Crew'){
				$nextStep = array('summary');
			}
			if(isset(Yii::app()->session['summary'])&&Yii::app()->session['summary']==1){
				$nextStep = array('summary');
			}
			$model->attributes=$_POST['User'];
			if(isset($_POST['Guest']))
				$guest->attributes = $_POST['Guest'];
			if($model->save()){
				if($model->has_guest==1&&isset($_POST['Guest'])){
					if($guest->save()){
						$this->redirect($nextStep);
					}
						
				}else{
					$this->redirect($nextStep);
				}
			}
			$model->stringToArray();
		}
		$this->render('hotel',array('model'=>$model,'guest'=>$guest));
	}

	public function actionTours(){
		$model = $this->loadModel(Yii::app()->user->id);
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		$model->setScenario('tours');
		$guest->setScenario('tours');
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$guest->attributes = $_POST['Guest'];
			if(isset($_POST['Guest']))
				$guest->attributes = $_POST['Guest'];
			if($model->save()){
				if($model->has_guest==1 && isset($_POST['Guest'])){
					if($guest->save()){
						$this->redirect(array('summary'));
					}
				}else{
					$this->redirect(array('summary'));
				}
			}
			$model->stringToArray();
		}
		$this->render('tours',array('model'=>$model,'guest'=>$guest));
	}

	public function actionEmailDinner($email=''){
		$this->layout = '//layouts/nonav';
		if(!$email==""){
			$this->user = $model = User::model()->findByAttributes(array('email'=>$email));
		}
		if($model === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		$model->setScenario('emailDinner');
		$guest->setScenario('emailDinner');
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$guest->attributes = $_POST['Guest'];
			if(isset($_POST['Guest']))
				$guest->attributes = $_POST['Guest'];
			$model->checkSave =false;
			if($model->save()){
				if($model->has_guest==1 && isset($_POST['Guest'])){
					if($guest->save()){
						//$this->redirect(array('summary'));
						Yii::app()->user->setFlash('success','Your Additional Information Has Been Saved, Thank You.');
					}else{
						Yii::app()->user->setFlash('error','Your Additional Information Has Not Been Saved, Please Try Again.');
					}
				}else{
					//$this->redirect(array('summary'));
					Yii::app()->user->setFlash('success','Your Additional Information Has Been Saved, Thank You.');
				}
			}else{
				Yii::app()->user->setFlash('error','Your Additional Information Has Not Been Saved, Please Try Again.');
			}
			$model->stringToArray();
		}
		$this->render('email_dinner',array('model'=>$model,'guest'=>$guest));
	}

	public function actionSummary(){
		$model = $this->loadModel(Yii::app()->user->id);
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		Yii::app()->session['summary'] = 1;
		$this->render('summary',array('model'=>$model,'guest'=>$guest));
	}

	public function actionEmailSummary($email=''){
		$this->layout = '//layouts/nonav';
		if(!$email==""){
			$this->user = $model = User::model()->findByAttributes(array('email'=>$email));
		}
		if($model === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		$tour_users = TourUser::model()->with('tour','seat')->findAllByAttributes(array('user_id'=>$model->id),array('order'=>'t.order_date asc,seat.begin_time asc'));
		$wishlists = Wishlist::model()->with('tour','seat')->findAllByAttributes(array('user_id'=>$model->id),array('order'=>'t.order_date asc,seat.begin_time asc'));
		
		$tour_guests = array();
		$guest_wishlists = array();
		$user = $model;
		$guest=new Guest;
		if($model->has_guest==1){
			
			$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
			$tour_guests = TourGuest::model()->with('tour','seat')->findAllByAttributes(array('guest_id'=>$guest->id),array('order'=>'t.order_date asc,seat.begin_time asc'));
			if($tour_guests===null){
				$tour_guests = array();
			}
			$guest_wishlists = WishlistsGuest::model()->with('tour','seat')->findAllByAttributes(array('guest_id'=>$guest->id),array('order'=>'t.order_date asc,seat.begin_time asc'));
			if($guest_wishlists === null){
				$guest_wishlists = array();
			}
		}
		
		if($model->tour_status==0)
		{
			$tour_users = array();
			$wishlists = array();
			$tour_guests = array();
			$guest_wishlists = array();
			} 
		
		
		$this->render('email_summary',array('tour_users'=>$tour_users,
					  'wishlists'=>$wishlists,
					  'user'=>$user,
					  'tour_guests'=>$tour_guests,
					  'guest_wishlists'=>$guest_wishlists,'model'=>$model,'guest'=>$guest));
	}

	public function actionEmail($id){
		$model = $this->loadModel($id);
		if($model->type=='Operating Committee'||$model->type=='Crew'||$model->type=='Gartner Crew'){
			$title = 'Gartner Winners Circle 2013, Sydney; Registration Invitation';
		}else{
			$title = 'Gartner Winners Circle 2013, Sydney; Registration Invitation';
		}
		$this->sendMail($model->email,$title,$model,'email','');
		//$this->viewPath = '//view/user';
		echo 'ok';
		Yii::app()->end();
		$this->layout = false;
		$this->render('email',array('user'=>$model));
	}

	public function actionDinnerEmail($from_id,$to_id){
		if(intval($from_id)>intval($to_id)){
			echo 'error params';
		}else{
			set_time_limit(0);
			for($i=intval($from_id);$i<=intval($to_id);$i++){
				try{
					$model = $this->loadModel($i);
					if(!($model->type=='Crew'||$model->type=="Gartner Crew"||$model->type=="Operating Committee") && $model->status==1){
						$title = 'Winners Circle 2013 Team Dinner Menu Choice';
						$this->sendMail($model->email,$title,$model,'dinner_email','');
						Yii::log('sent '.$model->email . "\t" . " OK",'error');
					}else{
						echo 'error';
					}
				}catch (Exception $e){
					Yii::log('sent '.$model->email . "\t" . "FALSE" . "\t" . $e,'error');
				}
			}
		}
		echo 'ok';
		Yii::app()->end();
	}

	public function actionComplete(){
		echo 'ok';Yii::app()->end();
	}

	public function actionDinner(){
		$this->redirect('tours');
		$model = $this->loadModel(Yii::app()->user->id);
		$guest = Guest::model()->findByAttributes(array('user_id'=>$model->id));
		if($guest === null){
			$guest = new Guest;
			$guest->user_id = $model->id;
		}
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save()){
				$this->redirect(array('tours'));
			}
		}

		$this->render('dinner',array('model'=>$model,'guest'=>$guest));
	}

	public function actionFinalize(){
		$this->layout = '//layouts/nonav';
		$model = $this->loadModel(Yii::app()->user->id);
		$model->status = 1;
		$model->checkSave = false;
		$model->created_at = new CDbExpression('NOW()');
		$model->billing_instruction = User::model()->getBillingInstructionByType($model->type);
		if($model->save())
		{
			//Yii::app()->user->logout();
		}
		if($model->type=='Crew'||$model->type=='Gartner Crew'){
			$title = 'Gartner Winners Circle 2013, Sydney; Registration Confirmation';
		}else{
			$title = 'Gartner Winners Circle 2013, Sydney; Registration Confirmation';
		}
		$this->sendMail($model->email,$title,$model,'finalize_mail');
		$this->render('finalize',array('model'=>$model));
	}

	public function actionDecline($email){
		$this->layout = '//layouts/nonav';
		$this->user = $model = User::model()->findByAttributes(array('email'=>$email));
		if($model === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}
		if($model->status==1){
			$this->layout = '//layouts/nonav';
			$this->render('return_finalized',array('user'=>$model));
			Yii::app()->end();
		}elseif($model->status == 2){
			$this->layout = '//layouts/nonav';
			$this->render('return_decline',array('user'=>$model));
			Yii::app()->end();
		}
		if(isset($_POST['User'])){
			if(isset($_POST["User"]['declien_reason'])&&!empty($_POST["User"]['declien_reason'])){
				$model->attributes = $_POST['User'];
				$model->checkSave = false;
				$model->status = 2;
				if($model->save()){
					$this->sendMail($model->email, 'Gartner Winners Circle Registration Decline Confirmation', $model,'decline_email');
					$this->render('after_decline',array('user'=>$model));
					Yii::app()->end();
				}
			}else{
				$model->addError('declien_reason', 'Reason for decline cannot be blank');
			}
		}
		$this->render('decline',array('user'=>$model));
	}
	public function actionVisa(){
		$this->layout = '//layouts/nonav';
		$this->render('visa');
	}

	public function actionTeamdinnermenu(){
		$this->layout = '//layouts/nonav';
		$this->render('teamdinnermenu');
	}
	public function actionGaladinnermenu(){
		$this->layout = '//layouts/nonav';
		$this->render('galadinnermenu');
	}

	public function actionBatchSend($from_id,$to_id){
		if(intval($from_id)>=intval($to_id)){
			echo 'error params';
		}else{
			set_time_limit(0);
			for($i=intval($from_id);$i<=intval($to_id);$i++){
				try{
					$model = $this->loadModel($i);
					if($model->type=='Operating Committee'||$model->type=='Crew'||$model->type=='Gartner Crew'){
						$title = 'Gartner Winners Circle 2013, Sydney; Registration Invitation';
					}else{
						$title = 'Gartner Winners Circle 2013, Sydney; Registration Invitation';
					}
					$this->sendMail($model->email,$title,$model,'email','');
					Yii::log('sent '.$model->email . "\t" . " OK",'error');
				}catch (Exception $e){
					Yii::log('sent '.$model->email . "\t" . "FALSE" . "\t" . $e,'error');
				}
			}
		}
		echo 'ok';
		Yii::app()->end();
	}
	public function actionHotelEmail($ids){
		$id_arr = explode(',',$ids);
		set_time_limit(0);
		foreach($id_arr as $id){
			try{
				$model = $this->loadModel(intval(trim($id)));
				if(!($model->type=="Operating Committee") && $model->status==1){
					$title = 'Gartner Winners Circle 2013 Hotel Reservation Number';
					$this->sendMail($model->email,$title,$model,'hotel_email','');
					echo "OK <br/>";
					Yii::log('sent '.$model->email . "\t" . " OK",'error');
				}else{
					echo 'OC error<br/>';
				}
			}catch (Exception $e){
				Yii::log('sent '.$model->email . "\t" . "FALSE" . "\t" . $e,'error');
			}
		}
		echo 'ok';
		Yii::app()->end();
	}
	
	public function actionFinEmail($ids){
		$id_arr = explode(',',$ids);
		set_time_limit(0);
		foreach($id_arr as $id){
			try{
				$model = $this->loadModel(intval(trim($id)));
				if($model->status==1){
					$title = 'Gartner Winners Circle 2013, Sydney; Registration Confirmation';
					$this->sendMail($model->email,$title,$model,'finalize_mail','');
					echo "OK <br/>";
					Yii::log('sent '.$model->email . "\t" . " OK",'error');
				}else{
					echo 'OC error<br/>';
				}
			}catch (Exception $e){
				Yii::log('sent '.$model->email . "\t" . "FALSE" . "\t" . $e,'error');
			}
		}
		echo 'ok';
		Yii::app()->end();
	}
	
		public function actionRemEmail($ids){
		$id_arr = explode(',',$ids);
		set_time_limit(0);
		foreach($id_arr as $id){
			try{
				$model = $this->loadModel(intval(trim($id)));
				if($model->status==0){
					$title = 'Winners Circle Registration Deadline - Friday February 21, 2014';
					$this->sendMailCC($model->email,$title,$model,'chase_email',$model->passport);
					echo "OK <br/>";
					Yii::log('sent '.$model->email . "\t" . " OK",'error');
				}else{
					echo 'Have registered<br/>';
				}
			}catch (Exception $e){
				Yii::log('sent '.$model->email . "\t" . "FALSE" . "\t" . $e,'error');
			}
		}
		echo 'ok';
		Yii::app()->end();
	}
	
	
		public function actionVisaEmail($ids){
		$id_arr = explode(',',$ids);
		set_time_limit(0);
		foreach($id_arr as $id){
			try{
				$model = $this->loadModel(intval(trim($id)));
				if($model->status==1){
					$title = 'Gartner Winners Circle 2013, Sydney; Visa Information';
					$this->sendMail($model->email,$title,$model,'visa_mail','');
					echo "OK <br/>";
					Yii::log('sent '.$model->email . "\t" . " OK",'error');
				}else{
					echo 'OC error<br/>';
				}
			}catch (Exception $e){
				Yii::log('sent '.$model->email . "\t" . "FALSE" . "\t" . $e,'error');
			}
		}
		echo 'ok';
		Yii::app()->end();
	}
	
}
