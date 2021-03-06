<?php

class ReportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
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
						'actions'=>array('login','hotelLogin'),
						'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('visa','index','onsiteAttended','onsiteGaladinner','onsiteTeamdinner',
								'onsiteGalatable','gift','ipad','onsiteUsers','onsiteExportGalaDietary',
								'onsiteExportTeamDietary','onsiteMeal','onsiteLibbys','onsiteExportLibbys','attendedDownload','noShowDownload','hoteldown'),
						'users'=>array('@'),
						'expression' => '$user->isAdmin'
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('winner','travel','hotel','tours','summary','registation',
								'housing','transfer','arrival','departure','dietary','download','teamdinner','galadinner',
								'galatable','printers','dmc','newRegistration','declined','cancelled','amex','users','dmcdownload','traveluser',
								'exportTeamDietary','exportGalaDietary','meal','libbys','exportLibbys','housinguser','hoteldown','dietaryhotel','ExportHotelDietary','QueryComment','updateQueryComment','OnsitePrint'),
						'users'=>array('@'),
						'expression' => '$user->isAdmin && ($user->name=="client" || $user->name=="Tony" || $user->name=="Caroline" || $user->name=="Dickie"|| $user->name=="Jem")'
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('transfer','arrival','departure','dmcdownload','amex','traveluser','QueryComment','updateQueryComment'),
						'users'=>array('@'),
						'expression' => '$user->isAdmin && $user->name=="Amex"'
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('dmc','newRegistration','declined','cancelled'),
						'users'=>array('@'),
						'expression' => '$user->isAdmin && $user->name=="claire"'
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('dmc','newRegistration','declined','cancelled'),
						'users'=>array('@'),
						'expression' => '$user->isAdmin && $user->name=="DMC"'
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('dietary','teamdinner','galadinner','galatable','meal','libbys','exportLibbys','exportTeamDietary'),
						'users'=>array('@'),
						'expression' => '$user->isAdmin && $user->name=="NTE"'
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('housingMaster','compare','travelComment','updateTravelComment','QueryComment','updateQueryComment'),
						'users'=>array('@'),
						'expression' => '$user->isAdmin'
				),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('create','update','index','view','admin','delete'),
						'users'=>array('admin'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('hotelReport'),
						'users'=>array('@'),
						'expression' => '$user->isHotelAdmin'
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}
	
	public function actionLogin(){
		$this->layout = false;
		$model=new Admin;
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['Admin']))
		{
			$model->attributes=$_POST['Admin'];
			if($model->validate() && $model->login()){
				$this->redirect(array('report/index'));
			}else{
				Yii::app()->user->setFlash('error','Password Error!');
			}
		}
		$this->render('login',array('model'=>$model));
	}
	
	public function actionDietary()
	{
		$teamDinners = array();
		$galaDinners = array();
		$vip =array();
		$vip1 =array();
		$dbCommand = Yii::app()->db->createCommand("SELECT team_dinner, team_dinner_dietary, count(1) AS num FROM 
				( SELECT team_dinner_dietary, team_dinner FROM users WHERE team_dinner IS NOT NULL AND team_dinner <> '' and status = 1 and type not in ('Gartner Crew','Crew','Operating Committee')
				UNION ALL 
				SELECT g.team_dinner_dietary, user.team_dinner FROM guests g,users user WHERE user.team_dinner IS NOT NULL AND user.team_dinner <> ''  and g.user_id= user.id and user.status = 1 and user.has_guest = 1  and user.type not in ('Gartner Crew','Crew','Operating Committee')
				) AS a GROUP BY team_dinner, team_dinner_dietary ORDER BY team_dinner, team_dinner_dietary");
		$result = $dbCommand->queryAll();
		if(isset($result)){
			foreach($result as $item){
				$teamDinners[$item['team_dinner']][$item['team_dinner_dietary']]=$item['num'];
			}
		}


		$dbCommand = Yii::app()->db->createCommand("select gala_dinner_dietary,count(1)  num,team_dinner from
				(select team_dinner_dietary as gala_dinner_dietary,team_dinner from users where status = 1 and team_dinner IS NOT NULL AND team_dinner <> '' and gala_dinner_vip <> 'Gala Dinner VIP' and type not in ('Gartner Crew','Crew')
				union all select g.team_dinner_dietary as gala_dinner_dietary,u.team_dinner from guests g,users u where g.user_id = u.id and u.status = 1 and u.has_guest = 1 and 
				u.team_dinner IS NOT NULL AND u.team_dinner <> '' and u.gala_dinner_vip <>'Gala Dinner VIP'
		) as a
				group by team_dinner,gala_dinner_dietary order by team_dinner,gala_dinner_dietary ");
		$gala = $dbCommand->queryAll();
		
		$dbCommand = Yii::app()->db->createCommand("select gala_dinner_dietary,count(1) as num  from
				(select team_dinner_dietary as gala_dinner_dietary,team_dinner from users where status = 1 and team_dinner IS NOT NULL AND team_dinner <> '' and gala_dinner_vip = 'Gala Dinner VIP' and type not in ('Gartner Crew','Crew') and (team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or type='Operating Committee')
				union all select g.team_dinner_dietary as gala_dinner_dietary,u.team_dinner from guests g,users u where g.user_id = u.id  and u.status = 1 and u.has_guest = 1  and u.team_dinner IS NOT NULL AND u.team_dinner <> '' and u.gala_dinner_vip = 'Gala Dinner VIP' and (u.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or u.type='Operating Committee')
		) as a
				group by gala_dinner_dietary order by team_dinner,gala_dinner_dietary ");
		$gala_vip = $dbCommand->queryAll();
		if(isset($gala)){
			foreach($gala as $item){
				$galaDinners[$item['team_dinner']][$item['gala_dinner_dietary']] = $item['num'];
			}
		}
		if(isset($gala_vip)){
			foreach($gala_vip as $item){
				$galaDinners['VIP'][$item['gala_dinner_dietary']] = $item['num'];
			}
		}
		$dbCommand = Yii::app()->db->createCommand("select gala_dinner_dietary,count(1) as num  from
				(select team_dinner_dietary as gala_dinner_dietary,team_dinner from users where status = 1 and team_dinner IS NOT NULL AND team_dinner <> '' and gala_dinner_vip = 'Gala Dinner VIP' and type not in ('Gartner Crew','Crew') and (team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or type='Operating Committee')
				union all select g.team_dinner_dietary as gala_dinner_dietary,u.team_dinner from guests g,users u where g.user_id = u.id  and u.status = 1 and u.has_guest = 1  and u.team_dinner IS NOT NULL AND u.team_dinner <> '' and u.gala_dinner_vip = 'Gala Dinner VIP' and (u.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or u.type='Operating Committee')
		) as a
				group by gala_dinner_dietary order by team_dinner,gala_dinner_dietary ");
		$gala_vip1 = $dbCommand->queryAll();
		
		if(isset($gala_vip1)){
			foreach($gala_vip1 as $item){
				$galaDinners['VIP1'][$item['gala_dinner_dietary']] = $item['num'];
			}
		}
		$this->render('dietary',array('teamDinners'=>$teamDinners,'galaDinners'=>$galaDinners));
	}
	public function actionDietaryHotel()
	{
		$teamDinners = array();
		
		$dbCommand = Yii::app()->db->createCommand("SELECT team_dinner, team_dinner_dietary, count(1) AS num FROM 
				( SELECT team_dinner_dietary, left( hotel_type, instr( hotel_type, ' - ' ) -1 ) as team_dinner  FROM users WHERE hotel_type IS NOT NULL AND hotel_type <> '' and status = 1 and type not in ('Gartner Crew','Crew')
				UNION ALL 
				SELECT g.team_dinner_dietary, left( user.hotel_type, instr( user.hotel_type, ' - ' ) -1 ) as team_dinner  FROM guests g,users user WHERE user.hotel_type IS NOT NULL AND user.hotel_type <> ''  and g.user_id= user.id and user.status = 1 and user.has_guest = 1  and user.type not in ('Gartner Crew','Crew')
				) AS a GROUP BY team_dinner, team_dinner_dietary ORDER BY team_dinner, team_dinner_dietary");
		$result = $dbCommand->queryAll();
		if(isset($result)){
			foreach($result as $item){
				$teamDinners[$item['team_dinner']][$item['team_dinner_dietary']]=$item['num'];
			}
		}


		$this->render('dietaryhotel',array('teamDinners'=>$teamDinners));
	}

	public function actionDownload()
	{
		$this->layout = '//layouts/export';
		$filename = 'All Users';
		$users = User::model()->with('guest')->findAll();
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('download',array('users'=>$users));
	}

	public function actionFood()
	{
		$this->render('food');
	}

	public function actionGaladinner()
	{
		$cirteria = new CDbCriteria;
		$cirteria->addCondition("team_dinner is not null and t.type <>'Crew' and  t.status = 1 ");
		$cirteria->order = 'team_dinner asc';
		$users = User::model()->findAll($cirteria);
		$cirteria = new CDbCriteria;
		$cirteria->addCondition('user.team_dinner is not null and user.status = 1 and user.has_guest = 1');
		$cirteria->order = 'user.team_dinner asc';
		$guests = Guest::model()->with('user')->findAll($cirteria);
		$this->render('galadinner',array('users'=>$users,'guests'=>$guests));
	}
	
	/**
	 * 非标准时间的，只管hotel_venue == 0的。 hotel_venue == 1 的不管标准日期以外的
	 * 
	 */
	public function actionHousing($hotel='Shangri-La')
	{
		
		set_time_limit(0);
		$users = User::model()->findAllBySql("select * from users t where t.status = 1 and t.hotel_type in (select concat(hotel_name,' - ' ,name) from hotels where hotel_name=:hotel_name )"
				,array(':hotel_name'=>$hotel));
		//$dateArr = array();
		$typeResult = array();
		$totalResult = array();
		foreach($users as $user){
			$from_date = $user->hotel_arrival_date;
			$end_date = $user->hotel_departure_date;
			
			//如果是非标准时间
// 			if($user->hotel_venue == 'I will be making my own arrangements'){
// 				if(in_array($user->type,array('Top Achievers','Eagles','Operating Committee'))){
// 					$from_date = 'Apr/16/2013';
// 				}else{
// 					$from_date = 'Apr/17/2013';
// 				}
// 				$end_date = "Apr/21/2013";
// 			}
			
			$from_date =  $this->strtodate($from_date);
			$end_date =  $this->strtodate($end_date);
			
			$tmpDate = $from_date;
			while($tmpDate < $end_date ){
				//if(!in_array($tmpDate,$dateArr)){
				//	$dateArr[]=$tmpDate;
			//	}
				if(isset($typeResult[$user->type][$user->hotel_type][$tmpDate])){
					$typeResult[$user->type][$user->hotel_type][$tmpDate]++;
				}else{
					$typeResult[$user->type][$user->hotel_type][$tmpDate] = 1;
				}
				
				if(isset($totalResult[$user->hotel_type][$tmpDate])){
					$totalResult[$user->hotel_type][$tmpDate]++;
				}else{
					$totalResult[$user->hotel_type][$tmpDate] = 1;
				}
				$tmpDate = date('Y-m-d',strtotime($tmpDate)+3600*24);
			}
		}
		$users1 = Room::model()->findAllBySql("select distinct date from rooms t where t.hotel_id in (select id from hotels where hotel_name=:hotel_name )"
				,array(':hotel_name'=>$hotel));
		$dateArr = array();

		foreach($users1 as $user1){
		$tmpDate1 = $this->strtodate($user1->date);
		if(!in_array($tmpDate1,$dateArr)){
					$dateArr[]=$tmpDate1;
				}
	}
		sort($dateArr);
		$this->render('housing',
				array('dates'=>$dateArr,
						'typeResult'=>$typeResult,
						'totalResult'=>$totalResult,
						'blocks'=>User::model()->getBlockRoom($hotel),
						'attritonRates'=>User::model()->getAttritonRates($hotel),
						'sellRates'=>User::model()->getSellRates($hotel),
						'hotel'=>$hotel));
	
	}
	
	public function actionHousingMaster($hotel='summary')
	{
		if($hotel=="summary"){
			$ShangriLa = User::model()->findBySql("
			SELECT SUM(
	(DATEDIFF(STR_TO_DATE(hotel_departure_date, '%b/%d/%Y'),
	STR_TO_DATE(hotel_arrival_date, '%b/%d/%Y'))+1)*s.`sell_rate` ) AS email
	 FROM 
(SELECT a.id,
CASE WHEN hotel_arrival_date>=mindate THEN hotel_arrival_date ELSE mindate END hotel_arrival_date,
CASE WHEN hotel_departure_date<=maxdate THEN hotel_departure_date ELSE maxdate END hotel_departure_date
FROM 
 (
SELECT a.id , b.hotel_departure_date,b.hotel_arrival_date FROM
(
SELECT * FROM v_hotel_room_info s WHERE s.hotel_name=:hotel_name
) a,
users b
WHERE a.hotel_type=b.hotel_type AND b.status=1
) a,
(
SELECT s.id, MAX(DATE) maxdate,MIN(DATE) mindate FROM `rooms` r,
v_hotel_room_info s
WHERE s.hotel_name=:hotel_name AND r.hotel_id = s.id AND r.is_master=1
GROUP BY id
 ) b WHERE a.id=b.id
 
 
 )a,
  v_hotel_room_info s WHERE a.id=s.id",array(':hotel_name'=>'Shangri-La'));

			$Hilton = User::model()->findBySql("
			SELECT SUM(
	(DATEDIFF(STR_TO_DATE(hotel_departure_date, '%b/%d/%Y'),
	STR_TO_DATE(hotel_arrival_date, '%b/%d/%Y'))+1)*s.`sell_rate` ) AS email
	 FROM 
(SELECT a.id,
CASE WHEN hotel_arrival_date>=mindate THEN hotel_arrival_date ELSE mindate END hotel_arrival_date,
CASE WHEN hotel_departure_date<=maxdate THEN hotel_departure_date ELSE maxdate END hotel_departure_date
FROM 
 (
SELECT a.id , b.hotel_departure_date,b.hotel_arrival_date FROM
(
SELECT * FROM v_hotel_room_info s WHERE s.hotel_name=:hotel_name
) a,
users b
WHERE a.hotel_type=b.hotel_type AND b.status=1
) a,
(
SELECT s.id, MAX(DATE) maxdate,MIN(DATE) mindate FROM `rooms` r,
v_hotel_room_info s
WHERE s.hotel_name=:hotel_name AND r.hotel_id = s.id AND r.is_master=1
GROUP BY id
 ) b WHERE a.id=b.id
 
 
 )a,
  v_hotel_room_info s WHERE a.id=s.id",array(':hotel_name'=>'Hilton',':hotel_name_like'=>'Hilton%'));

			$Sheraton = User::model()->findBySql("
			SELECT SUM(
	(DATEDIFF(hotel_departure_date,
	hotel_arrival_date)+1)*s.`sell_rate` ) AS email
	 FROM 
(SELECT a.id,
CASE WHEN str_to_date(hotel_arrival_date,'%M/%d/%Y')>=mindate THEN str_to_date(hotel_arrival_date,'%M/%d/%Y') ELSE mindate END hotel_arrival_date,
CASE WHEN str_to_date(hotel_departure_date,'%M/%d/%Y')<=maxdate THEN str_to_date(hotel_departure_date,'%M/%d/%Y') ELSE maxdate END hotel_departure_date
FROM 
 (
SELECT a.id , b.hotel_departure_date,b.hotel_arrival_date FROM
(
SELECT * FROM v_hotel_room_info s WHERE s.hotel_name=:hotel_name
) a,
users b
WHERE a.hotel_type=b.hotel_type AND b.status=1
) a,
(
SELECT s.id, MAX(str_to_date(DATE,'%M/%d/%Y')) maxdate,MIN(str_to_date(DATE,'%M/%d/%Y')) mindate FROM `rooms` r,
v_hotel_room_info s
WHERE s.hotel_name=:hotel_name AND r.hotel_id = s.id AND r.is_master=1
GROUP BY id
 ) b WHERE a.id=b.id
 
 
 )a,
  v_hotel_room_info s WHERE a.id=s.id",array(':hotel_name'=>'Sheraton'));
			
    $roomsum = Hotel::model()->findAllBySql("SELECT hotel_name, SUM( b.number * b.attriton_rate ) as attriton_rate 
FROM (

SELECT h.hotel_name, r.number, h.attriton_rate
FROM `hotels` h, rooms r
WHERE h.id = r.hotel_id
AND r.is_master =1
)b
GROUP BY b.hotel_name");
    $total1=0;
    $total2=0;
    $total3=0;
  
    foreach ($roomsum as $room)
    {

    	if($room->hotel_name=='Shangri-La'){
    		$total1=$room->attriton_rate;
    	}
    	else if($room->hotel_name=='Hilton'){
    		$total2=$room->attriton_rate;
    	}
    	else if($room->hotel_name=='Sheraton'){
    		$total3=$room->attriton_rate;
    	}
    }		

			$this->render('housingSummary',
				array('ShangriLa_total1'=>$total1,
				'ShangriLa_total2'=>$ShangriLa->email,
				'Hilton_total1'=>$total2,
				'Hilton_total2'=>$Hilton->email,
				'Sheraton_total1'=>$total3,
				'Sheraton_total2'=>$Sheraton->email,
				'total1'=>$total1+$total2+$total3,
				'total2'=>$ShangriLa->email+$Hilton->email+$Sheraton->email,
				'hotel'=>$hotel));
		}else {
		set_time_limit(0);
		$users = User::model()->findAllBySql("SELECT t.hotel_arrival_date,t.hotel_departure_date,t.hotel_type,
(SELECT MAX(str_to_date(DATE,'%M/%d/%Y' )) AS DATE FROM rooms WHERE hotel_id IN (SELECT id FROM hotels WHERE CONCAT(hotel_name,' - ' ,NAME)=t.hotel_type) AND is_master =1) AS first_name,
(SELECT MIN(str_to_date(DATE,'%M/%d/%Y')) AS DATE FROM rooms WHERE hotel_id IN (SELECT id FROM hotels WHERE CONCAT(hotel_name,' - ' ,NAME)=t.hotel_type) AND is_master =1) AS last_name		
FROM users t 
WHERE 
t.status = 1 
AND t.hotel_type IN (SELECT CONCAT(hotel_name,' - ' ,NAME) FROM hotels WHERE hotel_name=:hotel_name)"
				,array(':hotel_name'=>$hotel));
		$dateArr = array();
		$typeResult = array();
		$totalResult = array();
// 		$min_date = '2014-04-10';
// 		$max_date = '2014-04-13';
		foreach($users as $user){
			$from_date = $user->hotel_arrival_date;
			$end_date = $user->hotel_departure_date;
	
			//如果是非标准时间
			// 			if($user->hotel_venue == 'I will be making my own arrangements'){
			// 				if(in_array($user->type,array('Top Achievers','Eagles','Operating Committee'))){
			// 					$from_date = 'Apr/16/2013';
			// 				}else{
			// 					$from_date = 'Apr/17/2013';
			// 				}
			// 				$end_date = "Apr/21/2013";
			// 			}
	               
	                $max_date = $user->first_name;
	                $min_date = $user->last_name;
			$from_date =  $this->strtodate($from_date);
			$end_date =  $this->strtodate($end_date);
			$from_date = $from_date>=$min_date?$from_date:$min_date;
			$end_date = $end_date>=$max_date?$max_date:$end_date;
	
			$tmpDate = $from_date;
			while($tmpDate <= $end_date ){
				if(!in_array($tmpDate,$dateArr)){
					$dateArr[]=$tmpDate;
				}
				if(isset($typeResult[$user->type][$user->hotel_type][$tmpDate])){
					$typeResult[$user->type][$user->hotel_type][$tmpDate]++;
				}else{
					$typeResult[$user->type][$user->hotel_type][$tmpDate] = 1;
				}
	
				if(isset($totalResult[$user->hotel_type][$tmpDate])){
					$totalResult[$user->hotel_type][$tmpDate]++;
				}else{
					$totalResult[$user->hotel_type][$tmpDate] = 1;
				}
				$tmpDate = date('Y-m-d',strtotime($tmpDate)+3600*24);
			}
			}
			sort($dateArr);
			$this->render('housing_master',
					array('dates'=>$dateArr,
							'typeResult'=>$typeResult,
							'totalResult'=>$totalResult,
							'blocks'=>User::model()->getMasterBlockRoom($hotel),
							'attritonRates'=>User::model()->getAttritonRates($hotel),
							'sellRates'=>User::model()->getSellRates($hotel),
							'hotel'=>$hotel));
		}
		}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionRegistation($status=1)
	{
		$type_array = explode(',',User::model()->types);
		foreach($type_array as $type){
			$users[$type] = User::model()->countByAttributes(array('status'=>$status,'type'=>$type));
			$guests[$type] = User::model()->countByAttributes(array('status'=>$status,'type'=>$type,'has_guest'=>1));
		}
		$accepted_number = User::model()->countByAttributes(array('status'=>1));
		$nofeedback_number = User::model()->countByAttributes(array('status'=>0));
		$declined_number = User::model()->countByAttributes(array('status'=>2));
		
		$this->render('registation',array(
				'accepted'=>$accepted_number,'nofeedback'=>$nofeedback_number,'declined'=>$declined_number,
				'users'=>$users,
				'guests'=>$guests,
				'status'=>$status,
				));
	}

	public function actionTours()
	{
		$this->render('tours');
	}
	
	public function actionTransfer()
	{
		$this->render('transfer');
	}
	/**
	 * fi_adate  Arrival Date Into Sydney
	 */
	public function actionArrival(){
		$dates = array();
		$result = array();
		$arrivalDates = User::model()->findAllBySql("select distinct(fi_adate) fi_adate from users where status = 1 and type <>'Operating Committee' order by fi_adate");
		foreach ($arrivalDates as $date){
			$dates[$date->fi_adate]=$date->fi_adate;
		}
		$users = User::model()->findAllBySql("select type,count(1) as id,fi_adate from users where status = 1 and type <>'Operating Committee'  group by type,fi_adate order by type,fi_adate");
		foreach($users as $user){
			$result[$user->type][$user->fi_adate] = $user->id;
		}
		
		$guests = User::model()->findAllBySql("select u.type,count(1) as id,g.fi_adate from guests g,users u where u.status = 1 and u.has_guest = 1 and g.user_id = u.id and u.type <>'Operating Committee'  group by u.type,g.fi_adate order by u.type,g.fi_adate");
		$guestArrivalDates = Guest::model()->findAllBySql("select distinct(g.fi_adate) fi_adate from guests g,users u  where u.status = 1 and u.has_guest = 1 and g.user_id = u.id and u.type <>'Operating Committee' order by g.fi_adate");
		foreach($guestArrivalDates as $date){
			if(!isset($dates[$date->fi_adate])){
				$dates[$date->fi_adate]=$date->fi_adate;
			}
		}
		foreach($guests as $guest){
			if(isset($result[$guest->type][$guest->fi_adate])){
				$result[$guest->type][$guest->fi_adate]+= $guest->id;
			}else{
				$result[$guest->type][$guest->fi_adate] = $guest->id;
			}
		}
		$this->render('arrival',array('users'=>$result,'dates'=>$dates)); 
	}
	/**
	 * fi_ddate Departure date from Sydney
	 */
	public function actionDeparture(){

		$dates = array();
		$result = array();
		$arrivalDates = User::model()->findAllBySql("select distinct(fi_ddate) fi_ddate from users where status = 1 and type <>'Operating Committee' order by fi_ddate");
		foreach ($arrivalDates as $date){
			$dates[$date->fi_ddate]=$date->fi_ddate;
		}
		$users = User::model()->findAllBySql("select type,count(1) as id,fi_ddate from users  where status = 1 and type <>'Operating Committee'  group by type,fi_ddate order by type,fi_ddate");
		foreach($users as $user){
			$result[$user->type][$user->fi_ddate] = $user->id;
		}

		$guests = User::model()->findAllBySql("select u.type,count(1) as id,g.fi_ddate from guests g,users u where u.status = 1 and u.has_guest = 1 and g.user_id = u.id and u.type <>'Operating Committee'  group by u.type,g.fi_ddate order by u.type,g.fi_ddate");
		$guestArrivalDates = Guest::model()->findAllBySql("select distinct(g.fi_ddate) fi_ddate from guests g,users u  where u.status = 1 and g.user_id = u.id and u.type <>'Operating Committee' order by g.fi_ddate");
		foreach($guestArrivalDates as $date){
			if(!isset($dates[$date->fi_ddate])){
				$dates[$date->fi_ddate]=$date->fi_ddate;
			}
		}

		foreach($guests as $guest){
			if(isset($result[$guest->type][$guest->fi_ddate])){
				$result[$guest->type][$guest->fi_ddate]+= $guest->id;
			}else{
				$result[$guest->type][$guest->fi_ddate] = $guest->id;
			}
		}
		$this->render('departure',array('users'=>$result,'dates'=>$dates)); 
	}
	
	public function actionTeamdinner(){
		$criteria = new CDbCriteria;
		$criteria->addCondition("t.team_dinner is not null and t.team_dinner <> '' and t.status = 1 and (t.type not in ('Crew','Operating Committee','Gartner Crew') or (t.type='Gartner Crew' and t.id in (11958,11964,11959,11978,11960,11982,11981,11965,11974,11963,11976,11970,11971,12025,11966,11979,11977,11972)))");
		$criteria->order = 'team_dinner asc';
		$users = User::model()->findAll($criteria);
		$criteria = new CDbCriteria;
		$criteria->addCondition("user.team_dinner is not null and user.team_dinner <> '' and user.status = 1 and user.has_guest = 1  and user.type not in ('Crew','Gartner Crew','Operating Committee')");
		$criteria->order = 'user.team_dinner asc';
		$guests = Guest::model()->with('user')->findAll($criteria);
		$this->render('teamdinner',array('users'=>$users,'guests'=>$guests));
	}
	public function actionGalatable(){
		$this->render('galatable');
	}
	public function actionPrinters($download=0){
		$users = User::model()->with('guest')->findAllByAttributes(array('status'=>1),array('order'=>'t.type ,t.last_name asc'));
		if($download==1){
			$this->layout = '//layouts/export';
			$filename = 'Printers_List';
			header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
			header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
			header("Content-Transfer-Encoding: binary");
			header("Pragma: public");
			header("Cache-Control: public");
			$this->render('printers_export',array('users'=>$users));
			
		}else{
			$this->render('printers',array('users'=>$users));
		}
	}
	public function actionNewregistration($download=0){
		$criteria = new CDbCriteria();
		$criteria->addNotInCondition('type', array('Crew','Gartner Crew','Operating Committee'));
		$criteria->order = 'updated_at desc';
		$criteria->addColumnCondition(array('status'=>1));
		$users = User::model()->findAll($criteria);
		if($download==1){
			$this->layout = '//layouts/export';
			$filename = 'New_Registration_List';
			header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
			header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
			header("Content-Transfer-Encoding: binary");
			header("Pragma: public");
			header("Cache-Control: public");
			$this->render('new_registration_export',array('users'=>$users));
		}else{
			$this->render('new_registration',array('users'=>$users));
		}
	}
	public function actionDeclined($download=0){
		$criteria = new CDbCriteria();
		$criteria->addNotInCondition('type', array('Crew','Gartner Crew','Operating Committee'));
		$criteria->order = 'updated_at desc';
		$criteria->addColumnCondition(array('status'=>2));
		$users = User::model()->findAllByAttributes(array('status'=>2),array('order'=> 'updated_at desc'));
		if($download==1){
			$this->layout = '//layouts/export';
			$filename = 'Declined_List';
			header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
			header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
			header("Content-Transfer-Encoding: binary");
			header("Pragma: public");
			header("Cache-Control: public");
			$this->render('declined_export',array('users'=>$users));
		}else{
			$this->render('declined',array('users'=>$users));
		}
	}
	public function actionCancelled($download=0){
		$criteria = new CDbCriteria();
		$criteria->addNotInCondition('type', array('Crew','Gartner Crew','Operating Committee'));
		$criteria->order = 'updated_at desc';
		$criteria->addColumnCondition(array('status'=>3));
		$users = User::model()->findAll($criteria);
		if($download==1){
			$this->layout = '//layouts/export';
			$filename = 'Cancelled_List';
			header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
			header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
			header("Content-Transfer-Encoding: binary");
			header("Pragma: public");
			header("Cache-Control: public");
			$this->render('cancelled_export',array('users'=>$users));
		}else{
			$this->render('cancelled',array('users'=>$users));
		}
	}
	public function actionAmex(){
		$this->layout = '//layouts/export';
		$filename = 'AMEX_Travel_List';
		$criteria = new CDbCriteria();
		$criteria->addNotInCondition('type', array('Operating Committee'));
		$criteria->order = 't.created_at';
		$criteria->addColumnCondition(array('status'=>1));
		$users = User::model()->with('guest')->findAll($criteria);
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('amex',array('users'=>$users));
	}
	public function actionDmc(){
		$this->render('dmc');
	}
	public function actionUsers($type='',$status=0){
		$type_array = explode(',',$type);
		$criteria = new CDbCriteria();
		$criteria->addInCondition('type', $type_array);
		$criteria->addColumnCondition(array('status'=>$status));
		$criteria->order='t.updated_at desc';
		$users = User::model()->with('guest')->findAll($criteria);
		
		$this->layout = '//layouts/export';
		$filename = 'User_List';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('users',array('users'=>$users,'type'=>$type,'status'=>$status));
	}
	public function actionOnsiteUsers($type='',$status=0){
		$type_array = explode(',',$type);
		$criteria = new CDbCriteria();
		$criteria->addInCondition('type', $type_array);
		$criteria->addColumnCondition(array('status'=>$status,'t.has_checkin'=>1));
		$criteria->order='t.updated_at desc';
		$users = User::model()->with('guest')->findAll($criteria);
	
		$this->layout = '//layouts/export';
		$filename = 'User_List';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('users',array('users'=>$users,'type'=>$type,'status'=>$status));
	}
	public function actionDmcdownload(){
		$this->layout = '//layouts/export';
		$filename = 'DMC_Download_List';
		$users = User::model()->with('guest')->findAllByAttributes(array('status'=>1));
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('dmc_download',array('users'=>$users));
	}
	
	public function actionTraveluser($type='all',$fi_adate='',$fi_ddate='',$travelType=""){
		$type_array = explode(',',$type);
		$criteria = new CDbCriteria();
		if($type != 'all'){
			$criteria->addInCondition('type', $type_array);
		}
		if(!empty($fi_adate)){
			$criteria->addColumnCondition(array('t.fi_adate'=>$fi_adate));
		}
		if(!empty($fi_ddate)){
			$criteria->addColumnCondition(array('t.fi_ddate'=>$fi_ddate));
		}
		$criteria->order='t.updated_at desc';
		$criteria->addColumnCondition(array('t.status'=>1));
		$criteria->addCondition("t.type <>'Operating Committee'");
		$users = User::model()->with('guest')->findAll($criteria);
		
		
		$criteria = new CDbCriteria();
		$criteria->addInCondition('user.type', $type_array);
		$criteria->addColumnCondition(array('user.status'=>1,'user.has_guest'=>1));
		$criteria->addCondition("user.type <>'Operating Committee'");
		$criteria->join='inner join users user on user.id = t.user_id';
		$criteria->order='t.updated_at desc';
		if(!empty($type_array)){
			$criteria->addInCondition('type', $type_array);
		}
		if(!empty($fi_adate)){
			$criteria->addColumnCondition(array('t.fi_adate'=>$fi_adate));
		}
		if(!empty($fi_ddate)){
			$criteria->addColumnCondition(array('t.fi_ddate'=>$fi_ddate));
		}
		$guests = Guest::model()->findAll($criteria);
		$this->layout = '//layouts/export';
		$filename = 'User_List';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('traveluser',array('users'=>$users,'type'=>$type,'guests' => $guests,'travelType'=>$travelType));
	}
	
	public function actionExportTeamDietary($team_dinner='',$dietary='',$team_dinner_menu='',$table_no=''){
		$criteria = new CDbCriteria();
		if(!empty($team_dinner)){
			if ($team_dinner=='Sunday') 
			{
		$criteria->addInCondition('t.team_dinner', explode(',','Europe Sales,Americas SMB,Asia,Emerging Markets - India & CEEMEA,Client Partner Group,Japan Sales'));}
		 elseif ($team_dinner=='Friday')
		 {$criteria->addNotInCondition('t.team_dinner', explode(',','Europe Sales,Americas SMB,Asia,Emerging Markets - India & CEEMEA,Client Partner Group,Japan Sales'));}
		 else 
		 {$criteria->addInCondition('t.team_dinner', explode(',',$team_dinner));}
		}
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($team_dinner_menu)){
			$criteria->addInCondition('t.team_dinner_menu', explode(',',$team_dinner_menu));
		}
		if(!empty($table_no)){
			$criteria->addInCondition('t.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('status'=>'1'));
		$criteria->addCondition("t.team_dinner is not null and t.team_dinner <> '' and (t.type not in ('Crew','Operating Committee','Gartner Crew') or (t.type='Gartner Crew' and t.id in (11958,11964,11959,11978,11960,11982,11981,11965,11974,11963,11976,11970,11971,12025,11966,11979,11977,11972)))");
		$criteria->order = "t.id desc";
		$users = User::model()->findAll($criteria);
		
		$criteria = new CDbCriteria();
		if(!empty($team_dinner)){
			if ($team_dinner=='Sunday') 
			{
		$criteria->addInCondition('user.team_dinner', explode(',','Europe Sales,Americas SMB,Asia,Emerging Markets - India & CEEMEA,Client Partner Group,Japan Sales'));}
		 elseif ($team_dinner=='Friday')
		 {$criteria->addNotInCondition('user.team_dinner', explode(',','Europe Sales,Americas SMB,Asia,Emerging Markets - India & CEEMEA,Client Partner Group,Japan Sales'));}
		 else 
		 {$criteria->addInCondition('user.team_dinner', explode(',',$team_dinner));}
		}
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($team_dinner_menu)){
			$criteria->addInCondition('t.team_dinner_menu', explode(',',$team_dinner_menu));
		}
		if(!empty($table_no)){
			$criteria->addInCondition('user.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('user.status'=>'1','user.has_guest'=>1));
		$criteria->addCondition("user.team_dinner is not null and user.team_dinner <> '' and user.type not in ('Gartner Crew','Crew','Operating Committee')");
		$criteria->order = "t.id desc";
		$guests = Guest::model()->with('user')->findAll($criteria);
		
		$this->layout = '//layouts/export';
		$filename = 'Team_Dietary.xls';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('export_team_dietary',array('users'=>$users,'guests' => $guests));
		
	}
	
	public function actionExportHotelDietary($hotel='',$dietary='',$team_dinner_menu='',$table_no=''){
		$criteria = new CDbCriteria();
		if(!empty($hotel)){

		$criteria->addSearchCondition('t.hotel_type',$hotel );
		
		}
		 if(!empty($team_dinner_menu)){
			$criteria->addInCondition('t.team_dinner_menu', explode(',',$team_dinner_menu));
		}
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		$criteria->addColumnCondition(array('status'=>'1'));
		$criteria->addCondition("t.hotel_type is not null and t.hotel_type <> '' and t.type not in ('Gartner Crew','Crew')");
		$criteria->order = "t.id desc";
		$users = User::model()->findAll($criteria);
		
		$criteria = new CDbCriteria();
		if(!empty($hotel)){
		
		$criteria->addSearchCondition('user.hotel_type',$hotel );
		
		}
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($team_dinner_menu)){
			$criteria->addInCondition('t.team_dinner_menu', explode(',',$team_dinner_menu));
		}
		$criteria->addColumnCondition(array('user.status'=>'1','user.has_guest'=>1));
		$criteria->addCondition("user.hotel_type is not null and user.hotel_type <> '' and user.type not in ('Gartner Crew','Crew')");
		$criteria->order = "t.id desc";
		$guests = Guest::model()->with('user')->findAll($criteria);
		
		$this->layout = '//layouts/export';
		$filename = 'Team_Dietary.xls';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('export_team_dietary',array('users'=>$users,'guests' => $guests));
		
	}
	
	public function actionOnsiteExportTeamDietary($team_dinner='',$dietary='',$team_dinner_menu='',$table_no=''){
		$criteria = new CDbCriteria();
		if(!empty($team_dinner)){
			if ($team_dinner=='Sunday') 
			{
		$criteria->addInCondition('t.team_dinner', explode(',','Europe Sales,Americas SMB,Asia,Emerging Markets - India & CEEMEA,Client Partner Group,Japan Sales'));}
		 elseif ($team_dinner=='Friday')
		 {$criteria->addNotInCondition('t.team_dinner', explode(',','Europe Sales,Americas SMB,Asia,Emerging Markets - India & CEEMEA,Client Partner Group,Japan Sales'));}
		 else 
		 {$criteria->addInCondition('t.team_dinner', explode(',',$team_dinner));}
		}
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($team_dinner_menu)){
			$criteria->addInCondition('t.team_dinner_menu', explode(',',$team_dinner_menu));
		}
		if(!empty($table_no)){
			$criteria->addInCondition('t.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('status'=>'1','t.has_checkin'=>1,'t.no_gala_dinner'=>0));
		$criteria->addCondition("t.team_dinner is not null and t.team_dinner <> '' and (t.type not in ('Crew','Operating Committee','Gartner Crew') or (t.type='Gartner Crew' and t.id in (11958,11964,11959,11978,11960,11982,11981,11965,11974,11963,11976,11970,11971,12025,11966,11979,11977,11972)))");
		$criteria->order = "t.id desc";
		$users = User::model()->findAll($criteria);
		
		$criteria = new CDbCriteria();
		if(!empty($team_dinner)){
			if ($team_dinner=='Sunday') 
			{
		$criteria->addInCondition('user.team_dinner', explode(',','Europe Sales,Americas SMB,Asia,Emerging Markets - India & CEEMEA,Client Partner Group,Japan Sales'));}
		 elseif ($team_dinner=='Friday')
		 {$criteria->addNotInCondition('user.team_dinner', explode(',','Europe Sales,Americas SMB,Asia,Emerging Markets - India & CEEMEA,Client Partner Group,Japan Sales'));}
		 else 
		 {$criteria->addInCondition('user.team_dinner', explode(',',$team_dinner));}
		}
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($team_dinner_menu)){
			$criteria->addInCondition('t.team_dinner_menu', explode(',',$team_dinner_menu));
		}
		if(!empty($table_no)){
			$criteria->addInCondition('user.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('user.status'=>'1','user.has_guest'=>1,'t.has_checkin'=>1,'t.no_gala_dinner'=>0));
		$criteria->addCondition("user.team_dinner is not null and user.team_dinner <> '' and user.type not in ('Gartner Crew','Crew','Operating Committee')");
		$criteria->order = "t.id desc";
		$guests = Guest::model()->with('user')->findAll($criteria);
		
		$this->layout = '//layouts/export';
		$filename = 'Team_Dietary.xls';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('export_team_dietary',array('users'=>$users,'guests' => $guests));
	
	}
	
	public function actionExportGalaDietary($team_dinner='',$dietary='',$gala_dinner_menu='',$table_no=''){
		$criteria = new CDbCriteria();
		if(!empty($team_dinner)){
			if($team_dinner=='VIP'){
				$criteria->addColumnCondition(array('gala_dinner_vip'=>'Gala Dinner VIP'));
				$criteria->addCondition("(t.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or t.type='Operating Committee' )");
				$criteria->addNotInCondition('type', array('Crew'));
			}elseif($team_dinner=='Gartner CrewF'){
				$criteria->addColumnCondition(array('type'=>'Gartner Crew'));
				$criteria->addNotInCondition('gala_dinner_vip', array('Gala Dinner VIP'));
				$criteria->addCondition("t.id in (11968,11973,11969,11983,11962,11967,12056,11980,11941,12000,12041,12042,12043)");
				$criteria->addNotInCondition('type', array('Crew'));
			}elseif($team_dinner=='Gartner CrewS'){
				$criteria->addColumnCondition(array('type'=>'Gartner Crew'));
				$criteria->addNotInCondition('gala_dinner_vip', array('Gala Dinner VIP'));
				$criteria->addCondition("t.id in (11958,11964,11959,11978,11960,11982,11981,11965,11974,11962,11963,11976,11970,11983,11971,12025,11966,11967,11979,11977,11972,11941,12050,12114,12115,12116)");
				$criteria->addNotInCondition('type', array('Crew'));
			}elseif($team_dinner=="Crew"){
				$criteria->addInCondition('type', array('Crew'));
			}elseif($team_dinner=='VIP1'){
				$criteria->addColumnCondition(array('gala_dinner_vip'=>'Gala Dinner VIP'));
				$criteria->addCondition("(t.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or t.type='Operating Committee' )");
				$criteria->addNotInCondition('type', array('Crew'));
			}else{
				
				if ($team_dinner=='Friday') 
					{
				$criteria->addCondition("(t.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or t.type='Operating Committee' or (t.type='Gartner Crew' and t.id in (11968,11973,11969,11983,11962,11967,12056,11980,11941,12000,12041,12042,12043)) )");}
				 elseif ($team_dinner=='Sunday')
				 {$criteria->addCondition("((t.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') and t.type<>'Gartner Crew') or t.type='Operating Committee' or (t.type='Gartner Crew' and t.id in (11958,11964,11959,11978,11960,11982,11981,11965,11974,11962,11963,11976,11970,11983,11971,12025,11966,11967,11979,11977,11972,11941,12050,12114,12115,12116)) )");}
				 else 
				 {$criteria->addInCondition('t.team_dinner', explode(',',$team_dinner));
				 	$criteria->addNotInCondition('gala_dinner_vip', array('Gala Dinner VIP'));
				 	}
				
				
				$criteria->addNotInCondition('type', array('Crew'));
			}
		}
		
		$criteria->addCondition("team_dinner is not null");
		
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($gala_dinner_menu)){
			$criteria->addInCondition('t.gala_dinner_menu', explode(',',$gala_dinner_menu));
		}
		if(!empty($table_no)){
			$criteria->addInCondition('t.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('status'=>'1'));
		$criteria->order = "t.id desc";
		
		$users = User::model()->findAll($criteria);
	
		$criteria = new CDbCriteria();
		if(!empty($team_dinner)){
			if($team_dinner=='VIP'){
				$criteria->addCondition("user.gala_dinner_vip='Gala Dinner VIP'");
				$criteria->addCondition("(user.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or user.type='Operating Committee' )");
				

			}elseif($team_dinner=='VIP1'){
				$criteria->addCondition("user.gala_dinner_vip='Gala Dinner VIP'");
				$criteria->addCondition("(user.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or user.type='Operating Committee' )");
				
			}else{
				
				if ($team_dinner=='Friday') 
					{
				$criteria->addCondition("(user.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or user.type='Operating Committee' )");}
				 elseif ($team_dinner=='Sunday')
				 {$criteria->addCondition("(user.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or user.type='Operating Committee' )");}
				 else 
				 {$criteria->addInCondition('user.team_dinner', explode(',',$team_dinner));
				 	$criteria->addNotInCondition('gala_dinner_vip', array('Gala Dinner VIP'));
				 	}
				
				
				
			}
		}
		
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($gala_dinner_menu)){
			$criteria->addInCondition('t.gala_dinner_menu', explode(',',$gala_dinner_menu));
		}
		if(!empty($table_no)){
			$criteria->addInCondition('user.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('user.status'=>'1','user.has_guest'=>1));
		$criteria->order = "t.id desc";
		$guests = Guest::model()->with('user')->findAll($criteria);
	
		$this->layout = '//layouts/export';
		$filename = 'Gala_Dietary';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('export_gala_dietary',array('users'=>$users,'guests' => $guests,'team_dinner'=>$team_dinner));
	
	}
	
	public function actionOnsiteExportGalaDietary($team_dinner='',$dietary='',$gala_dinner_menu='',$table_no=''){
		$criteria = new CDbCriteria();
		if(!empty($team_dinner)){
			if($team_dinner=='VIP'){
				$criteria->addColumnCondition(array('gala_dinner_vip'=>'Gala Dinner VIP'));
				$criteria->addCondition("(t.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or t.type='Operating Committee' )");
				
				$criteria->addNotInCondition('type', array('Crew'));
		  }elseif($team_dinner=='Gartner CrewF'){
				$criteria->addColumnCondition(array('type'=>'Gartner Crew'));
				$criteria->addNotInCondition('gala_dinner_vip', array('Gala Dinner VIP'));
				$criteria->addCondition("t.id in (11968,11973,11969,11983,11962,11967,12056,11980,11941,12000,12041,12042,12043)");
				$criteria->addNotInCondition('type', array('Crew'));
			}elseif($team_dinner=='Gartner CrewS'){
				$criteria->addColumnCondition(array('type'=>'Gartner Crew'));
				$criteria->addNotInCondition('gala_dinner_vip', array('Gala Dinner VIP'));
				$criteria->addCondition("t.id in (11958,11964,11959,11978,11960,11982,11981,11965,11974,11963,11962,11976,11970,11983,11971,12025,11966,11967,11979,11977,11972,11941,12050,12114,12115,12116)");
				$criteria->addNotInCondition('type', array('Crew'));
			}elseif($team_dinner=="Crew"){
				$criteria->addInCondition('type', array('Crew'));
			}elseif($team_dinner=='VIP1'){
				$criteria->addColumnCondition(array('gala_dinner_vip'=>'Gala Dinner VIP'));
				$criteria->addCondition("(t.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or t.type='Operating Committee' )");
				$criteria->addNotInCondition('type', array('Crew'));
			}else{
				
				if ($team_dinner=='Friday') 
					{
				$criteria->addCondition("(t.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or t.type='Operating Committee' or (t.type='Gartner Crew' and t.id in (11968,11973,11969,11983,11962,11967,12056,11980,11941,12000,12041,12042,12043)) )");}
				 elseif ($team_dinner=='Sunday')
				 {$criteria->addCondition("((t.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') and t.type<>'Gartner Crew') or t.type='Operating Committee' or (t.type='Gartner Crew' and t.id in (11958,11964,11959,11978,11960,11982,11981,11965,11974,11963,11962,11976,11970,11983,11971,12025,11966,11967,11979,11977,11972,11941,12050,12114,12115,12116)) )");}
				 else 
				 {$criteria->addInCondition('t.team_dinner', explode(',',$team_dinner));
				 	$criteria->addNotInCondition('gala_dinner_vip', array('Gala Dinner VIP'));
				 	}
				
				
				$criteria->addNotInCondition('type', array('Crew'));
			}
		}
		
		$criteria->addCondition("team_dinner is not null and t.has_checkin = 1 and t.no_gala_dinner = 0");
		
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($gala_dinner_menu)){
			$criteria->addInCondition('t.gala_dinner_menu', explode(',',$gala_dinner_menu));
		}
		if(!empty($table_no)){
			$criteria->addInCondition('t.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('status'=>'1'));
		$criteria->order = "t.id desc";
		
		$users = User::model()->findAll($criteria);
	
		$criteria = new CDbCriteria();
		if(!empty($team_dinner)){
			if($team_dinner=='VIP'){
				$criteria->addCondition("user.gala_dinner_vip='Gala Dinner VIP'");
				$criteria->addCondition("(user.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or user.type='Operating Committee' )");
				

			}elseif($team_dinner=='VIP1'){
				$criteria->addCondition("user.gala_dinner_vip='Gala Dinner VIP'");
				$criteria->addCondition("(user.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or user.type='Operating Committee' )");
				
			}else{
				
				if ($team_dinner=='Friday') 
					{
				$criteria->addCondition("(user.team_dinner in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or user.type='Operating Committee' )");}
				 elseif ($team_dinner=='Sunday')
				 {$criteria->addCondition("(user.team_dinner not in ('Europe Sales','Americas SMB','Asia','Emerging Markets - India & CEEMEA','Client Partner Group','Japan Sales') or user.type='Operating Committee' )");}
				 else 
				 {$criteria->addInCondition('user.team_dinner', explode(',',$team_dinner));
				 	$criteria->addNotInCondition('gala_dinner_vip', array('Gala Dinner VIP'));
				 	}
				
				
				
			}
		}
		
		if(!empty($dietary)){
			$criteria->addInCondition('t.team_dinner_dietary', explode(',',$dietary));
		}
		if(!empty($gala_dinner_menu)){
			$criteria->addInCondition('t.gala_dinner_menu', explode(',',$gala_dinner_menu));
		}
		if(!empty($table_no)){
			$criteria->addInCondition('user.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('user.status'=>'1','user.has_guest'=>1,'t.has_checkin'=>1,'t.no_gala_dinner'=>0));
		$criteria->order = "t.id desc";
		$guests = Guest::model()->with('user')->findAll($criteria);
	
		$this->layout = '//layouts/export';
		$filename = 'Gala_Dietary';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('export_gala_dietary',array('users'=>$users,'guests' => $guests,'team_dinner'=>$team_dinner));
	
	}
	
	public function actionMeal(){
		$meals = array();
		$dbCommand = Yii::app()->db->createCommand("select gala_dinner_menu ,table_no,count(1) as num from users where status = 1 and type <> 'Crew' group by table_no,gala_dinner_menu order by table_no");
		$result = $dbCommand->queryAll();
		if(isset($result)){
			foreach($result as $item){
				$meals[$item['table_no']][$item['gala_dinner_menu']]=$item['num'];
			}
		}
		$dbCommand = Yii::app()->db->createCommand("select g.gala_dinner_menu ,u.table_no,count(1) as num from users u,guests g where u.id = g.user_id and u.has_guest = 1 and u.type<>'Crew' and u.status = 1 group by u.table_no,g.gala_dinner_menu order by u.table_no");
		$result = $dbCommand->queryAll();
		if(isset($result)){
			foreach($result as $item){
				if(isset($meals[$item['table_no']][$item['gala_dinner_menu']])){
					$meals[$item['table_no']][$item['gala_dinner_menu']]+=$item['num'];
				}else{
					$meals[$item['table_no']][$item['gala_dinner_menu']]=$item['num'];
				}
			}
		}
		$this->render('meal',array('meals'=>$meals));
	}
	
	public function actionOnsiteMeal(){
		$meals = array();
		$dbCommand = Yii::app()->db->createCommand("select gala_dinner_menu ,table_no,count(1) as num 
				from users where status = 1 and no_gala_dinner = 0 and has_checkin = 1 and type <> 'Crew' and table_no <> '' and table_no is not null group by table_no,gala_dinner_menu order by table_no");
		$result = $dbCommand->queryAll();
		if(isset($result)){
			foreach($result as $item){
				$meals[$item['table_no']][$item['gala_dinner_menu']]=$item['num'];
			}
		}
		$dbCommand = Yii::app()->db->createCommand("select g.gala_dinner_menu ,u.table_no,count(1) as num 
				from users u,guests g where u.id = g.user_id  and g.no_gala_dinner = 0 and g.has_checkin = 1 and u.has_guest = 1 and u.type<>'Crew' and u.status = 1 and table_no <> '' and table_no is not null group by u.table_no,g.gala_dinner_menu order by u.table_no");
		$result = $dbCommand->queryAll();
		if(isset($result)){
			foreach($result as $item){
				if(isset($meals[$item['table_no']][$item['gala_dinner_menu']])){
					$meals[$item['table_no']][$item['gala_dinner_menu']]+=$item['num'];
				}else{
					$meals[$item['table_no']][$item['gala_dinner_menu']]=$item['num'];
				}
			}
		}
		$this->render('onsite_meal',array('meals'=>$meals));
	}
	public function actionLibbys(){
		$meals = array();
		$dbCommand = Yii::app()->db->createCommand("SELECT sum(user_num) AS user_num, table_no, team_dinner, sum(guest_num) as guest_num FROM ( SELECT count(1) AS user_num, table_no, team_dinner, 0 AS guest_num FROM users WHERE STATUS = 1 AND table_no IS NOT NULL AND table_no <> '' GROUP BY table_no,team_dinner UNION ALL SELECT 0 AS user_num, u.table_no, u.team_dinner, count(1) AS guest_num FROM guests g, users u WHERE u.has_guest = 1 and g.user_id = u.id AND u. STATUS = 1 GROUP BY table_no,team_dinner ) AS a GROUP BY table_no,team_dinner");
		$meals = $dbCommand->queryAll();
		if($meals === null){
			$meals = array();
		}
		$this->render('libbys',array('meals'=>$meals));
	}
	public function actionOnsiteLibbys(){
		$meals = array();
		$dbCommand = Yii::app()->db->createCommand("SELECT sum(user_num) AS user_num, table_no, team_dinner, sum(guest_num) as guest_num 
				FROM ( SELECT count(1) AS user_num,team_dinner, table_no, 0 AS guest_num FROM users WHERE STATUS = 1  and no_gala_dinner = 0  and has_checkin = 1 AND table_no IS NOT NULL AND table_no <> '' and table_no is not null GROUP BY table_no 
						UNION ALL 
						SELECT 0 AS user_num,u.team_dinner, u.table_no, count(1) AS guest_num FROM guests g, users u WHERE u.has_guest = 1  and g.no_gala_dinner = 0 and g.user_id = u.id and g.has_checkin = 1 AND u. STATUS = 1 AND u.table_no <> '' and u.table_no is not null GROUP BY table_no ) AS a GROUP BY table_no");
		$meals = $dbCommand->queryAll();
		if($meals === null){
			$meals = array();
		}
		$this->render('onsite_libbys',array('meals'=>$meals));
	}
	public function actionExportLibbys($table_no=''){
		$criteria = new CDbCriteria();
		if(!empty($table_no)){
			$criteria->addInCondition('t.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('status'=>'1'));
		$criteria->order = "t.id desc";
		$users = User::model()->with('guest')->findAll($criteria);
		
		$criteria = new CDbCriteria();
		if(!empty($table_no)){
			$criteria->addInCondition('user.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('user.status'=>'1','user.has_guest'=>1));
		$criteria->order = "t.id desc";
		$guests = Guest::model()->with('user')->findAll($criteria);
		$this->layout = '//layouts/export';
		$filename = 'Libby_List';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('libbys_export',array('users'=>$users,'guests' => $guests));
		
	}
	
	public function actionOnsiteExportLibbys($table_no='all'){
		$criteria = new CDbCriteria();
		if($table_no!='all'){
			$criteria->addInCondition('t.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('t.status'=>'1','t.has_checkin'=>1,'t.no_gala_dinner'=>0));
		$criteria->addCondition("type <> 'Crew'");
		$criteria->order = "t.id desc";
		$users = User::model()->with('guest')->findAll($criteria);
	
		$criteria = new CDbCriteria();
		if($table_no!='all'){
			$criteria->addInCondition('user.table_no', explode(',',$table_no));
		}
		$criteria->addColumnCondition(array('user.status'=>'1','user.has_guest'=>1,'t.has_checkin'=>1,'t.no_gala_dinner'=>0));
		$criteria->order = "t.id desc";
		$guests = Guest::model()->with('user')->findAll($criteria);
		$this->layout = '//layouts/export';
		$filename = 'Libby_List';
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('onsite_libbys_export',array('users'=>$users,'guests' => $guests));
	
	}
	
	public function strtodate($str){
		$dateTime = new datetime;
		try{
			$dateTime = datetime::createfromformat('M/d/Y',$str);
			if(empty($dateTime)){
				return '0000-00-00';
			}else{
				return $dateTime->format('Y-m-d');
			}
		}catch(Exception $e){
			return '0000-00-00';
		}
		
	}
	
	public function actionHousinguser($type='all',$date='',$hotel_type='all'){
		$type_array = explode(',',$type);
		$hotel_type_array = explode(',',$hotel_type);
		$criteria = new CDbCriteria();
		//date?
		if(!empty($date)){
			$criteria->addCondition("str_to_date(t.hotel_departure_date,'%b/%e/%Y') > str_to_date(:hotel_departure_date,'%Y-%m-%e') and str_to_date(t.hotel_arrival_date,'%b/%e/%Y') <= str_to_date(:hotel_arrival_date,'%Y-%m-%e')");
			$criteria->params=array(':hotel_arrival_date'=>$date,':hotel_departure_date'=>$date);
		}
		
		
		if($type != 'all'){
			$criteria->addInCondition('type', $type_array);
		}
		if($hotel_type != 'all'){
			$criteria->addInCondition('hotel_type', $hotel_type_array);
		}
		$criteria->order='t.updated_at desc';
		$criteria->addColumnCondition(array('t.status'=>1));
		$users = User::model()->with('guest')->findAll($criteria);
//  	echo count($users);Yii::app()->end();
		$this->layout = '//layouts/export';
		$filename = 'User_List';
		header('Content-type:application/xls;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('housinguser',array('users'=>$users));
	}
	//'onsiteAttended','onsiteGaladinner','onsiteTeamdinner','onsiteGalatable','gift','ipad'
	public function actionOnsiteAttended($status=1){
		$type_array = explode(',',User::model()->types);
		foreach($type_array as $type){
			$users[$type]['r'] = User::model()->countByAttributes(array('status'=>$status,'type'=>$type));
			$users[$type]['a'] = User::model()->countByAttributes(array('status'=>$status,'type'=>$type,'has_checkin'=>1));
			$guests[$type]['r'] = Guest::model()->countBySql('select count(*) from guests g,users u where g.user_id = u.id and u.status = :status and u.type = :type and u.has_guest = 1',
					array(':status'=>$status,':type'=>$type));
			$guests[$type]['a'] = Guest::model()->countBySql('select count(*) from guests g,users u where g.user_id = u.id and u.status = :status and u.type = :type and u.has_guest = 1 and g.has_checkin = 1',
					array(':status'=>$status,':type'=>$type));
		}
		$users['Total']['r'] = User::model()->count("status=:status and type<>'Crew' and type <> 'Gartner Crew' ",array(':status'=>$status,));
		$users['Total']['a'] = User::model()->count("status=:status and type<>'Crew' and type <> 'Gartner Crew' and has_checkin = 1 ",array(':status'=>$status));
		$guests['Total']['r'] =Guest::model()->countBySql("select count(*) from guests g,users u where g.user_id = u.id and u.status = :status and u.has_guest = 1 and type<>'Crew' and type <> 'Gartner Crew' ",
					array(':status'=>$status));
		$guests['Total']['a'] = Guest::model()->countBySql("select count(*) from guests g,users u where g.user_id = u.id and u.status = :status and u.has_guest = 1 and g.has_checkin = 1  and type<>'Crew' and type <> 'Gartner Crew'",
					array(':status'=>$status));
		$this->render('onsite_attended',array(
				'users'=>$users,
				'guests'=>$guests,
				'status'=>$status,
		));
	}
	public function actionOnsiteGaladinner(){
		$cirteria = new CDbCriteria;
		$cirteria->addCondition("team_dinner is not null and t.type <>'Crew' and  t.status = 1 and t.has_checkin = 1 and t.no_gala_dinner = 0");
		$cirteria->order = 'team_dinner asc';
		$users = User::model()->findAll($cirteria);
		$cirteria = new CDbCriteria;
		$cirteria->addCondition('t.gala_dinner_menu is not null and user.team_dinner is not null and user.status = 1 and user.has_guest = 1 and t.has_checkin = 1 and t.no_gala_dinner = 0');
		$cirteria->order = 'user.team_dinner asc';
		$guests = Guest::model()->with('user')->findAll($cirteria);
		$this->render('onsite_galadinner',array('users'=>$users,'guests'=>$guests));
	}
	public function actionOnsiteTeamdinner(){
		$criteria = new CDbCriteria;
		$criteria->addCondition("t.team_dinner is not null and t.team_dinner <> '' and t.status = 1 and t.has_checkin = 1 and t.type not in ('Crew','Gartner Crew','Operating Committee')");
		$criteria->order = 'team_dinner asc';
		$users = User::model()->findAll($criteria);
		$criteria = new CDbCriteria;
		$criteria->addCondition("user.team_dinner is not null and user.team_dinner <> '' and user.status = 1 and t.has_checkin = 1 and user.has_guest = 1  and user.type not in ('Crew','Gartner Crew','Operating Committee')");
		$criteria->order = 'user.team_dinner asc';
		$guests = Guest::model()->with('user')->findAll($criteria);
		$this->render('onsite_teamdinner',array('users'=>$users,'guests'=>$guests));
			}
	public function actionOnsiteGalatable(){
		$this->render('onsite_galatable');
	}
	public function actionGift($download=0){
		$users = User::model()->with('gift')->findAllByAttributes(array('has_gift'=>1));
		$guests = Guest::model()->with('user','gift')->findAllByAttributes(array('has_gift'=>1));
		if($download==1){
			$this->layout = '//layouts/export';
			$filename = 'Gift_Report';
			header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
			header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
			header("Content-Transfer-Encoding: binary");
			header("Pragma: public");
			header("Cache-Control: public");
			$this->render('gift_export',array('users'=>$users,'guests'=>$guests));
		
		}else{
			$this->render('gift',array('users'=>$users,'guests'=>$guests));
		}
	}
	public function actionIpad($download=0){
		$users = User::model()->findAllByAttributes(array('has_ipad'=>1));
		if($download==1){
			$this->layout = '//layouts/export';
			$filename = 'Collection_Report';
			header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
			header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
			header("Content-Transfer-Encoding: binary");
			header("Pragma: public");
			header("Cache-Control: public");
			$this->render('ipad_export',array('users'=>$users));
		
		}else{
			$this->render('ipad',array('users'=>$users));
		}
	}
	
	public function actionAttendedDownload($type="all"){
		$this->layout = '//layouts/export';
		$filename = 'All Users';
		
		$criteria = new CDbCriteria();
		$type_array = explode(',',$type);
		if($type != 'all'){
			$criteria->addInCondition('type', $type_array);
		}
		$criteria->addCondition('t.status = 1 and (t.has_checkin = 1 or guest.has_checkin = 1)');
		$users = User::model()->with('guest')->findAll($criteria);
		
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('onsite_download',array('users'=>$users));
	}
	public function actionNoShowDownload($type="all"){
		$this->layout = '//layouts/export';
		$filename = 'All Users';
		$criteria = new CDbCriteria();
		$criteria->addCondition('t.status = 1 and (t.has_checkin = 0 or guest.has_checkin = 0)');
		$type_array = explode(',',$type);
		if($type != 'all'){
			$criteria->addInCondition('type', $type_array);
		}
		$users = User::model()->with('guest')->findAll($criteria);
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('onsite_noshow_download',array('users'=>$users));
	}
	public function actionCompare(){
		$users = User::model()->findAll('(departure_date <> hotel_arrival_date or return_date<>hotel_departure_date) and status = 1');
		$guests = Guest::model()->with('user')->findAll('(t.departure_date <> t.hotel_arrival_date or t.return_date<>t.hotel_departure_date) and user.status = 1');
		$this->render('compare',array('users'=>$users,'guests'=>$guests));
	}
	
	public function actionTravelComment($status='Finish'){
		$users = User::model()->findAllByAttributes(array('status' => '1',  'travel_comment_status'=>$status));
		$this->render('travel_comment',array('users'=>$users,'status'=>$status));
	}
	
	public function actionUpdateTravelComment($id){
		$model = User::model()->findByPk($id);
		if($model === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else{
			if(isset($_POST['User'])){
				
				$model->setScenario('search');
				$model->attributes=$_POST['User'];
				if($model->save()){
					$this->redirect(array('report/travelComment'));
				}
			}
		}
		$this->render('update_travel_comment',array('model'=>$model));
	}

	public function actionVisa($status='Not applied'){
		$users = User::model()->with('guest')->findAllByAttributes(array('visa_status'=>$status,'status'=>1));
		$criteria = new CDbCriteria();
		$criteria->addCondition('user.status', 1);
		$criteria->addColumnCondition(array('t.visa_status'=>$status));
		$guests = Guest::model()->with('user')->findAll($criteria);
		$this->render('visa',array('users'=>$users,'guests'=>$guests,'status'=>$status));
	}
	public function actionHotelLogin(){
		$this->layout = false;
		$model=new Admin;
		
		if(isset($_POST['Admin']))
		{
			$model->attributes=$_POST['Admin'];
			if( $model->hotelLogin()){
				$this->redirect(array('report/hotelReport'));
			}else{
				Yii::app()->user->setFlash('error','Email Error!');
			}
		}
		$this->render('hotel_login',array('model'=>$model));
	}
	public function actionHotelReport(){
		$users = User::model()->with('guest')->findAllByAttributes(array('status'=>1));
		$this->sendMail(Yii::app()->user->email, 'Hotel Information', $users,'hotel_report');
		$this->render('hotel_report');
	}
	
	public function actionHoteldown($hotel='all'){
		$this->layout = '//layouts/export';
		$filename = 'Hotel Information Download';
		$criteria = new CDbCriteria();
		$criteria->addCondition('t.status = 1');
		if ($hotel!='all')
		{
			$criteria->addSearchCondition('t.hotel_type',$hotel);
			
			}
		
		$users = User::model()->with('guest')->findAll($criteria);
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('hoteldown',array('users'=>$users));
	}
public function actionQueryComment($status='Pending'){
		$users = Query::model()->findAllByAttributes(array('status' => '1',  'status'=>$status));
		$this->render('query_comment',array('users'=>$users,'status'=>$status));
	}
	
	public function actionUpdateQueryComment($id){
		$model = Query::model()->findByPk($id);
		if($model === null){
			throw new CHttpException(404,'The requested page does not exist.');
		}else{
			if(isset($_POST['Query'])){
				
				$model->setScenario('search');
				$model->attributes=$_POST['Query'];
				if($model->save()){
					$this->redirect(array('report/QueryComment'));
				}
			}
		}
		$this->render('update_query_comment',array('model'=>$model));
	}
	
	public function actionOnsitePrint()
	{

		$this->layout = '//layouts/export';
		$filename = 'Onsite Print Download';
		$cirteria = new CDbCriteria;
		$cirteria->addCondition("t.type not in ('Crew','Gartner Crew') and  t.status = 1 ");
		$cirteria->order = 't.last_name asc';
		$users = User::model()->with('guest')->findAll($cirteria);
	
		header('Content-type:application/csv;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=' . $filename . '.xls');//文件名
		header("Content-Transfer-Encoding: binary");
		header("Pragma: public");
		header("Cache-Control: public");
		$this->render('onsiteprint',array('users'=>$users));
	}
}

