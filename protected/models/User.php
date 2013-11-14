<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property integer $status
 * @property string $declien_reason
 * @property string $first_name
 * @property string $last_name
 * @property string $office_location
 * @property string $department
 * @property string $telephone_number_desk
 * @property string $telephone_number_cell
 * @property string $email
 * @property string $password
 * @property string $date_of_birth
 * @property string $dietary_requirements
 * @property string $passport
 * @property string $special_requests
 * @property string $nationality
 * @property integer $has_guest
 * @property string $departure_date
 * @property string $return_date
 * @property string $airport_name
 * @property string $airport_code
 * @property string $travel_policy
 * @property string $visa_policy
 * @property string $hotel_arrival_date
 * @property string $hotel_departure_date
 * @property string $hotel_venue
 * @property integer $gala_dinner
 * @property integer $other_activity
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $daytime_phone
 * @property string $evening_phone
 * @property string $work_address1
 * @property string $work_address2
 * @property string $work_city
 * @property string $work_state
 * @property string $work_zip_code
 * @property string $work_country
 * @property string $managers_name
 * @property string $emergency_contact_name
 * @property string $emergency_contact_tel_number
 * @property string $relationship_with_the_emergency_contact
 * @property string $ga_passport
 * @property string $ga_dateofbirth
 * @property string $ga_firstname
 * @property string $ga_lastname
 * @property string $ga_gender
 * @property string $ga_card_number
 * @property string $ga_card_country
 * @property string $ga_card_expiration_date
 * @property string $ga_card_issue_date
 * @property string $ga_redress_number
 * @property string $previous_winners
 * @property string $times
 * @property string $years
 * @property string $destination_city
 * @property string $preferred_seat_request
 * @property string $preferred_airline_frequent_flyer_number
 * @property string $other
 * @property string $need_visa
 * @property string $visa_letter
 * @property string $checked
 * @property string $room_type
 * @property string $room_requirements
 * @property string $credit_card_number
 * @property string $credit_card_expiration_date
 * @property string $cardholders_name
 * @property string $credit_card_type
 * @property string $hotel_type
 * @property string $hotel_confirmation_number
 * @property int $has_checkin
 * @property string $headset
 */
class User extends TrackStarActiveRecord
{
	
	public $read_policy;
	//public $types = 'Operating,Winners,Crew,Eagles,Hosts,Top achievers,Third party,Host GVP,Host Gen';
	public $types = 'Winners,Eagles,Top Achievers,Operating Committee,Host GEN,Host GVP,Gartner Crew,Crew';
	public $statusName ;
	public $checkSave = true;
	public $img;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('guest_travel_ticket,guest_coupon,status, has_guest, gala_dinner, other_activity, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('frequent_flyer_number,preferred_airline, first_name, last_name, office_location, department, telephone_number_desk, telephone_number_cell, email, password, date_of_birth, 
					dietary_requirements, passport, special_requests, nationality, airport_name, airport_code, travel_policy, visa_policy,hotel_venue, daytime_phone, 
					evening_phone, work_address1, work_address2, work_city, work_state, work_zip_code, work_country, managers_name, emergency_contact_name, 
					emergency_contact_tel_number, relationship_with_the_emergency_contact, ga_passport, ga_dateofbirth, ga_firstname, ga_lastname, ga_gender, 
					ga_card_number, ga_card_country, ga_card_expiration_date, ga_card_issue_date, ga_redress_number, previous_winners, times, years, destination_city, 
					preferred_seat_request, preferred_airline_frequent_flyer_number, other, need_visa, visa_letter, checked, room_type, room_requirements, credit_card_number, 
					credit_card_expiration_date, cardholders_name, credit_card_type, table_no', 'length', 'max'=>255),
			array('departure_date, return_date, hotel_arrival_date, hotel_departure_date', 'length', 'max'=>20),
			array('hotel_type,preferred_name,read_policy,declien_reason,fi_status,fi_adate,fi_adate1,fi_aflight1,fi_afrom1,fi_ato1,fi_adep1,fi_aarr1,fi_adate2,fi_aflight2,fi_afrom2,fi_ato2,fi_adep2,fi_aarr2,fi_adate3,fi_aflight3,fi_afrom3,fi_ato3,fi_adep3,fi_aarr3,fi_ddate,fi_ddate1,fi_dflight1,fi_dfrom1,fi_dto1,fi_ddep1,fi_darr1,fi_ddate2,fi_dflight2,fi_dfrom2,fi_dto2,fi_ddep2,fi_darr2,fi_ddate3,fi_dflight3,fi_dfrom3,fi_dto3,fi_ddep3,fi_darr3,
					driving,frequent_flyer_number,preferred_airline,comment,dietary_comment,gala_dinner_vip,crew_diet_requirements,crew_other_info,crew_menu_choice,crew_unifrom_size,requirements,cardholders_address,csv_number,type,gender,created_at, updated_at,team_dinner,team_dinner_menu,team_dinner_dietary,gala_dinner_menu,gala_dinner_dietary',
					 'safe'),
			// The following rule is used by search().
			
            // Please remove those attributes that should not be searched.
            array('id, status, declien_reason, first_name, last_name, office_location, department, telephone_number_desk, telephone_number_cell, email, password, date_of_birth, dietary_requirements, passport, special_requests, nationality, has_guest, departure_date, return_date, airport_name, airport_code, travel_policy, visa_policy, hotel_arrival_date, hotel_departure_date, hotel_venue, gala_dinner, other_activity, created_at, created_by, updated_at, updated_by, daytime_phone, evening_phone, work_address1, work_address2, work_city, work_state, work_zip_code, work_country, managers_name, emergency_contact_name, emergency_contact_tel_number, relationship_with_the_emergency_contact, ga_passport, ga_dateofbirth, ga_firstname, ga_lastname, ga_gender, ga_card_number, ga_card_country, ga_card_expiration_date, ga_card_issue_date, ga_redress_number, previous_winners, times, years, destination_city, preferred_seat_request, preferred_airline_frequent_flyer_number, other, need_visa, visa_letter, checked, room_type, room_requirements, credit_card_number, credit_card_expiration_date, cardholders_name, credit_card_type, team_dinner, team_dinner_menu, team_dinner_dietary, gala_dinner_menu, gala_dinner_dietary, type, gender, country, preferred_name, requirements, cardholders_address, csv_number, crew_diet_requirements, crew_other_info, crew_menu_choice, crew_unifrom_size, comment, gala_dinner_vip, dietary_comment, frequent_flyer_number, preferred_airline, hotel,flight_price,employeeid,payrollnumber,driving,fi_status, fi_adate, fi_adate1, fi_aflight1, fi_afrom1, fi_ato1, fi_adep1, fi_aarr1, fi_adate2, fi_aflight2, fi_afrom2, fi_ato2, fi_adep2, fi_aarr2, fi_adate3, fi_aflight3, fi_afrom3, fi_ato3, fi_adep3, fi_aarr3, fi_ddate, fi_ddate1, fi_dflight1, fi_dfrom1, fi_dto1, fi_ddep1, fi_darr1, fi_ddate2, fi_dflight2, fi_dfrom2, fi_dto2, fi_ddep2, fi_darr2, fi_ddate3, fi_dflight3, fi_dfrom3, fi_dto3, fi_ddep3, fi_darr3, table_no, room_bigtype, hotel_type, hotel_confirmation_number, has_checkin, headset, has_gift, has_ipad, amount, checkin_at, gift_at, ipad_at, middel_name, middle_name, job_title, cost_centre_number, region, region_comment, ga_middlename, departure_city, travel_region, travel_ticket, coupon, title, title_comment, guest_travel_ticket, guest_coupon', 'safe', 'on'=>'search'),
			array('ga_dateofbirth,preferred_name,daytime_phone,telephone_number_cell,work_address1,work_city,work_zip_code,work_country,
					emergency_contact_name,emergency_contact_tel_number, relationship_with_the_emergency_contact,has_guest,relationship_with_the_emergency_contact','required',
					'on'=>'winner'),		
			array('destination_city,ga_passport,ga_firstname,ga_lastname,ga_gender,ga_passport,
					ga_card_number, ga_card_country, ga_card_expiration_date, ga_card_issue_date,airport_name,destination_city,departure_date,return_date,visa_letter,checked,
					','required','on'=>'travel'),
				array('permanent_home_address,place_of_birth,destination_city,ga_passport,ga_firstname,ga_lastname,ga_gender,ga_passport,
						ga_card_number, ga_card_country, ga_card_expiration_date, ga_card_issue_date,airport_name,destination_city,departure_date,return_date,visa_letter,checked,
						','required','on'=>'travel_visa'),
			array('years','crewRequired','on'=>'winner'),
			array('times','crewRequiredPlus','on'=>'winner'),
			array('team_dinner','teamDinnerRequired','on'=>'winner'),
			array('crew_menu_choice,crew_unifrom_size','crewNewRequired','on'=>'winner'),
			array('read_policy','required','on'=>'travel','message'=>'You need to agree to the Winners Circle travel policy'),
			array('read_policy','required','on'=>'driving','message'=>'You need to agree to the Winners Circle travel policy'),
			array('read_policy','required','on'=>'travel_visa','message'=>'You need to agree to the Winners Circle travel policy'),
			array('room_type,hotel_arrival_date,hotel_departure_date,credit_card_number,credit_card_expiration_date,cardholders_name,credit_card_type,cardholders_address,csv_number','required','on'=>'hotel'),
			array('room_type','required','on'=>'ochotel'),
			array('team_dinner_menu,gala_dinner_menu','required','on'=>'tours'),
			array('team_dinner_menu','required','on'=>'emailDinner'),
				
			array('hotel_confirmation_number','length','max'=>'50'),
			array('has_checkin,headset,has_gift, checkin_at, gift_at,has_ipad,ipad_at,img,amount,ipadupdated_at,ipad_by,ipadupdated_by','safe','on'=>'checkin'),
			//array('headset','required','on'=>'gift'),
			array('travel_ticket,coupon,guest_travel_ticket,guest_coupon','length','max'=>'1'),
				
			array('no_gala_dinner,travel_comment,travel_comment_status,dietary_commnet,billing_instruction,visa_status,permanent_home_address,place_of_birth','safe'),
			array('credit_card_number', 'length', 'min'=>16,'on'=>'hotel'),
		);
	}
	
	public function crewRequired($attribute,$params){
		if($this->type!='Crew' && $this->type!="Gartner Crew"){
			if(empty($this->$attribute)){
				$this->addError($attribute, $attribute . ' cannot be blank.');
			}
		}
	}
	
	public function crewNewRequired($attribute,$params){
		if($this->type=='Crew'||$this->type=="Gartner Crew"){
			if(empty($this->$attribute)||$this->$attribute=='' || $this->$attribute==null ){
				$this->addError($attribute, $attribute . ' cannot be blank.');
			}
		}
	}
	
	public function crewRequiredPlus($attribute,$params){
		if($this->type!='Crew' && $this->type!="Gartner Crew"){
			if($this->$attribute=='' || $this->$attribute==null ){
				$this->addError($attribute, $attribute . ' cannot be blank.');
			}
		}
	}
	public function teamDinnerRequired($attribute,$params){
		if($this->type!='Crew'){
			if(empty($this->$attribute)){
				$this->addError($attribute, $attribute . ' cannot be blank.');
			}
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'guest' => array(self::HAS_ONE,'Guest','user_id'),
				'gift' => array(self::BELONGS_TO,'Gift','headset'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'status' => 'Status',
			'declien_reason' => 'Decline Reason',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'preferred_name'=>'Preferred First name as will appear on your badge',
			'declien_reason'=>'Decline Reason',
			'office_location' => 'Office Location',
			'department' => 'Department',
			'telephone_number_desk' => 'Telephone Number Desk',
			'telephone_number_cell' => 'Cell phone (include country code)',
			'email' => 'Business Email Address',
			'password' => 'Password',
			'date_of_birth' => 'Date Of Birth',
			'dietary_requirements' => 'Dietary Requirements',
			'passport' => 'Passport',
			'special_requests' => 'Special Requests (access / allergies)',
			'nationality' => 'Nationality',
			'has_guest' => 'Has Guest',
			'departure_date' => 'Arrival Date',
			'return_date' => 'Return Date',
			'airport_name' => 'Preferred Departure Airport / City',
			'airport_code' => 'Closest Airport Code',
			'travel_policy' => 'Travel Policy',
			'visa_policy' => 'Visa Policy',
			'hotel_arrival_date' => 'Check in date',
			'hotel_departure_date' => 'Check out date',
			'hotel_venue' => 'Hotel Venue',
			'gala_dinner' => 'Gala Dinner',
			'other_activity' => 'Other Activity',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
				'evening_phone'=>'Evening phone (include country code)',
				'daytime_phone'=>'Daytime phone (include country code)',
				'work_state'=>'Work State (complete if from USA, Canada or Australia)',
				'work_zip_code'=>'Work Zip code / postal code',
				'emergency_contact_name'=>'Emergency Contact Name (contact details for someone other than the person travelling with you )',
				'emergency_contact_tel_number'=>'Emergency Contact Tel Number (include country code)',
				
				'team_dinner_dietary'=>'Dietary',
				'ga_passport' => 'Gartner Winner Passport Nationality',
				'ga_dateofbirth' => 'Gartner Winner Date of Birth <br/>(eg: Feb/14/1990)',
				'ga_firstname' => 'Gartner Winner Passport Legal ID First Name(s)',
				'ga_lastname' => 'Gartner Winner Passport Legal ID Last Name(s)',
				'ga_gender' => 'Gartner Winner Passport Gender',
				'ga_card_number' => 'Gartner Winner Passport Card Number',
				'ga_card_country' => 'Gartner Winner Passport Country of Issue',
				'ga_card_expiration_date' => 'Gartner Winner Passport Expiration Date <br/>(eg: Feb/14/1990)',
				'ga_card_issue_date' => 'Gartner Winner Passport Issue Date <br/>(eg: Feb/14/1990)',
				'ga_redress_number' => 'Gartner Winner Passport Redress Number (if applicable)',
				'previous_winners' => 'Were you a Winner of these previous Winners Circle events?',
				'times' => 'How many times have you been to a Winner Circle',
				'years' => 'How many years have you been employed by Gartner?',
				
				'other'=>'Is there any other information you need to communicate',
				'visa_letter'=>'Would you like the registration team to provide you with a visa invitation letter?',
				'checked'=>'Have you checked if you need a visa?',
				'need_visa'=>'Most travellers require a Visa to enter Australia.  Check here to see if you qualify for ETA visa program.',
				'credit_card_type'=>'Type of Credit Card',
				'requirements'=>'Have you any special requirements?',
				'cardholders_address'=>'Cardholders Address, City, State, Country, Postal Code',
				'csv_number'=>'CSV number',
				'crew_unifrom_size'=>'Crew Uniform Size',
				'fi_status'=>'Flight Information Status',
				'fi_adate'=>'Arrival Date Into Sydney',
				'fi_adate1'=>'Arrival Date',
				'fi_aflight1'=>'Arrival Flight',
				'fi_afrom1'=>'Arrival From',
				'fi_ato1'=>'Arrival To',
				'fi_adep1'=>'Arrival Dep',
				'fi_aarr1'=>'Arrival Arr',
				'fi_adate2'=>'Arrival Date',
				'fi_aflight2'=>'Arrival Flight',
				'fi_afrom2'=>'Arrival From',
				'fi_ato2'=>'Arrival To',
				'fi_adep2'=>'Arrival Dep',
				'fi_aarr2'=>'Arrival Arr',
				'fi_adate3'=>'Arrival Date',
				'fi_aflight3'=>'Arrival Flight',
				'fi_afrom3'=>'Arrival From',
				'fi_ato3'=>'Arrival To',
				'fi_adep3'=>'Arrival Dep',
				'fi_aarr3'=>'Arrival Arr',
				'fi_ddate'=>'Departure date from Sydney',
				'fi_ddate1'=>'Departure Date',
				'fi_dflight1'=>'Departure Flight',
				'fi_dfrom1'=>'Departure From',
				'fi_dto1'=>'Departure To',
				'fi_ddep1'=>'Departure Dep',
				'fi_darr1'=>'Departure Arr',
				'fi_ddate2'=>'Departure Date',
				'fi_dflight2'=>'Departure Flight',
				'fi_dfrom2'=>'Departure From',
				'fi_dto2'=>'Departure To',
				'fi_ddep2'=>'Departure Dep',
				'fi_darr2'=>'Departure Arr',
				'fi_ddate3'=>'Departure Date',
				'fi_dflight3'=>'Departure Flight',
				'fi_dfrom3'=>'Departure From',
				'fi_dto3'=>'Departure To',
				'fi_ddep3'=>'Departure Dep',
				'fi_darr3'=>'Departure Arr',
				'work_address1'=>'Work Address 1',
				'work_address2'=>'Work Address 2',
				'table_no'=>'Table Number',
				'has_checkin'=>'Checked-in',
				'headset'=>'Gift Collection',
				'amount'=>'Amex Card Redemption Amount',
				'coupon'=>'Winner Circle Lounge Voucher',
				'travel_ticket'=>'Winner Transport Ticket',
				'guest_coupon'=>'Guest Circle Lounge Voucher',
				'guest_travel_ticket'=>'Guest Transport Ticket',
				'has_ipad'=>'Sign status',
				'flight_price'=>'flight price',
				'employeeid'=>'EmployeeID',
				'payrollnumber'=>'payrollnumber',
		        'hotel_type'=>'Hotel Type',
		        'driving'=>'Driving',
		        'hotel_confirmation_number'=>'Hotel Confirmation number',
		        'visa_status'=>'Visa status',
				'no_gala_dinner'=>'Winners Not Attending Gala Dinner',
				
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($status = '')
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('declien_reason',$this->declien_reason,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('office_location',$this->office_location,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('telephone_number_desk',$this->telephone_number_desk,true);
		$criteria->compare('telephone_number_cell',$this->telephone_number_cell,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('dietary_requirements',$this->dietary_requirements,true);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('special_requests',$this->special_requests,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('has_guest',$this->has_guest);
		$criteria->compare('departure_date',$this->departure_date,true);
		$criteria->compare('return_date',$this->return_date,true);
		$criteria->compare('airport_name',$this->airport_name,true);
		$criteria->compare('airport_code',$this->airport_code,true);
		$criteria->compare('travel_policy',$this->travel_policy,true);
		$criteria->compare('visa_policy',$this->visa_policy,true);
		$criteria->compare('hotel_arrival_date',$this->hotel_arrival_date,true);
		$criteria->compare('hotel_departure_date',$this->hotel_departure_date,true);
		$criteria->compare('hotel_venue',$this->hotel_venue,true);
		$criteria->compare('gala_dinner',$this->gala_dinner);
		$criteria->compare('other_activity',$this->other_activity);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		if (!empty($status)) {
			 $criteria->compare('status',$status);
		}
		
       
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array('defaultOrder'=>'updated_at desc'),
		));
	}
	
	public function getDietaryOptions(){
		return array(
				'None'=>'None',
				'No Fish / Shell Fish'=>'No Fish / Shell Fish',
				'No Dairy'=>'No Dairy',
				'Nut Allergy'=>'Nut Allergy',
				'Fish Allergy'=>'Fish Allergy',
				'Vegetarian'=>'Vegetarian',
				'Vegan vegetarian'=>'Vegan vegetarian',
				'Gluten Intolerance / Celiac'=>'Gluten Intolerance / Celiac',
				'Halal'=>'Halal',
				'Kosher'=>'Kosher',
				'Other'=>'Other',
		);
	}
	public function getRelationshipOptions(){
		return array(
				''=>'Please select',
				'Spouse'=>'Spouse',
				'Partner'=>'Partner',
				'Friend'=>'Friend',
				'Other'=>'Other',
		);
	}
	
	public function arrayToString(){
		if(is_array($this->travel_policy)){
			$this->travel_policy = implode(',',$this->travel_policy);
		}
		if(is_array($this->visa_policy)){
			$this->visa_policy = implode(',',$this->visa_policy);
		}
		if(is_array($this->gala_dinner)){
			$this->gala_dinner = implode(',',$this->gala_dinner);
		}
		if(is_array($this->other_activity)){
			$this->other_activity = implode(',',$this->other_activity);
		}
		if(is_array($this->checked)){
			$this->checked = implode(',',$this->checked);
		}
	}
	
	public function stringToArray(){
		if(!empty($this->travel_policy)){
			$this->travel_policy = explode(',',$this->travel_policy);
		}
		if(!empty($this->visa_policy)){
			$this->visa_policy = explode(',',$this->visa_policy);
		}
		if(!empty($this->gala_dinner)){
			$this->gala_dinner = explode(',',$this->gala_dinner);
		}
		if(!empty($this->other_activity)){
			$this->other_activity = explode(',',$this->other_activity);
		}
		if(!empty($this->checked)){
			$this->checked = explode(',',$this->checked);
		}
	}
	public function beforeValidate(){
		parent::beforeValidate();
		$this->arrayToString();
		return true;
	}
	
	public function getHasGuestOptions(){
		return array(
				0=>'I am not bringing a guest',
				1=>'I am bringing a guest',
				//2=>'I am undecided',
				);
	}
       public function getSexOptions(){
		return array(
				'Ladies'=>'Ladies',
				'Mens'=>'Mens:	Chest Size (in inches)',
				//2=>'I am undecided',
				);
	}
    public function getLadiesOptions()
    {
    	return array(
    	        ''=>'Please select',
				'UK 8'=>'UK 8',
				'UK 10'=>'UK 10',
				'UK 12'=>'UK 12',
				'UK 14'=>'UK 14',
				'UK 16'=>'UK 16',
				'UK 18'=>'UK 18',
				'US 4'=>'US 4',
				'US 6'=>'US 6',
				'US 8'=>'US 8',
				'US 10'=>'US 10',
				'US 12'=>'US 12',
				'US 14'=>'US 14',
				);
    }
    
    public function getMensOptions()
    {
    	return array(
    	        ''=>'Please select',
				'36'=>'36',
				'38'=>'38',
				'40'=>'40',
				'42'=>'42',
				'44'=>'44',
				'46'=>'46',
				);
    }
	public function getHasGuestText(){
		$options = $this->getHasGuestOptions();
		return isset($options[$this->has_guest])?$options[$this->has_guest]:'';
	}
	
	public function getStatusOptions(){
		return array(
				0=>'Invited',
				1=>'Accepted',
				2=>'Declined',
				3=>'Cancelled',
				4=>'Active'
				);
	}
	
//	public  function getTourStatusOptions()
//	{
//		return array(
//				0=>'Invited',
//				1=>'Accepted',
//				2=>'Declined',
//				3=>'Cancelled',
//				4=>'Active'
//				);
//	}
//    public function getTourStatusText(){
//		$options = $this->getTourStatusOptions();
//		return isset($options[$this->tour_status])?$options[$this->status]:'';
//	}
	public function getStatusText(){
		$options = $this->getStatusOptions();
		return isset($options[$this->status])?$options[$this->status]:'';
	}
	
	public function relationshipList(){
		return array(
				''=>'Please select',
				'Spouse'=>'Spouse',
				'Partner'=>'Partner',
				'Friend'=>'Friend',
				'Parent'=>'Parent',
				'Other'=>'Other',
				);
	}
	public function genderList(){
		return array(
				''=>'',
				'Male'=>'Male',
				'Female'=>'Female',
				);
	}
	
	public function typeList(){
		return array(
				'Winners'=>'Winners',
				'Eagles'=>'Eagles',
				'Top Achievers'=>'Top Achievers',
				'Operating Committee'=>'Operating Committee',
				'Host GEN'=>'Host GEN',
				'Host GVP'=>'Host GVP',
				'Gartner Crew'=>'Gartner Crew',
				'Crew'=>'Crew',
		);
	}
	public function numberList(){
		return array(
				'',
				1,
				2,
				3,
				4,
				5,
				6,
				7,
				8,
				9,
				'10+'=>'10+'
		);
	}
	public function numberListPlus(){
		return array(
				''=>'',
				0=>0,
				1=>1,
				2=>2,
				3=>3,
				4=>4,
				5=>5,
				6=>6,
				7=>7,
				8=>8,
				9=>9,
				'10+'=>'10+'
		);
	}
	public function previousList(){
		return array(
				'Barcelona (Winners Circle 2008)'=>'Barcelona (Winners Circle 2008)',
				'Grand Bahama (Winners Circle 2009)'=>'Grand Bahama (Winners Circle 2009)',
				'Rome (Winners Circle 2010)'=>'Rome (Winners Circle 2010)',
				'Maui (Winners Circle 2011)'=>'Maui (Winners Circle 2011)',
				'Miami (Winners Circle 2012)'=>'Miami (Winners Circle 2012)',
				//'None of the above'=>'None of the above',
				);
	}
	public function yesNoList(){
		return array('Yes'=>'Yes','No'=>'No');
	}
	public function roomTypeList(){
		return array('King (1 bed)'=>'King (1 bed)','Double (2 beds)'=>'Double (2 beds)');
	}
	public function creditCardType(){
		//Visa	Mastercard	American Express	Diners Club Card	Discover	JCB	Carte Blanche
		return array(
				'Visa'=>'Visa',
				'Mastercard'=>'Mastercard',
				'American Express'=>'American Express',
				'Diners Club'=>'Diners Club',
				'JCB	Carte Blanche'=>'JCB	Carte Blanche',
				);
	}
	public function countryList(){
		return array(
				''=>'',
				'AFGHANISTAN'=>'AFGHANISTAN',
				'ALBANIA'=>'ALBANIA',
				'ALGERIA'=>'ALGERIA',
				'AMERICAN SAMOA'=>'AMERICAN SAMOA',
				'ANDORRA'=>'ANDORRA',
				'ANGOLA'=>'ANGOLA',
				'ANGUILLA'=>'ANGUILLA',
				'ANTIGUA & BARBUDA'=>'ANTIGUA & BARBUDA',
				'ARGENTINA'=>'ARGENTINA',
				'ARMENIA, REPUBLIC OF'=>'ARMENIA, REPUBLIC OF',
				'ARUBA'=>'ARUBA',
				'AUSTRALIA'=>'AUSTRALIA',
				'AUSTRIA'=>'AUSTRIA',
				'AZERBAIJAN, REPUBLIC OF'=>'AZERBAIJAN, REPUBLIC OF',
				'BAHAMAS'=>'BAHAMAS',
				'BAHRAIN'=>'BAHRAIN',
				'BANGLADESH'=>'BANGLADESH',
				'BARBADOS'=>'BARBADOS',
				'BELARUS'=>'BELARUS',
				'BELGIUM'=>'BELGIUM',
				'BELIZE'=>'BELIZE',
				'BENIN'=>'BENIN',
				'BERMUDA'=>'BERMUDA',
				'BHUTAN'=>'BHUTAN',
				'BOLIVIA'=>'BOLIVIA',
				'BOSNIA HERZEGOVINA'=>'BOSNIA HERZEGOVINA',
				'BOTSWANA'=>'BOTSWANA',
				'BRAZIL'=>'BRAZIL',
				'BRITISH VIRGIN ISLANDS'=>'BRITISH VIRGIN ISLANDS',
				'BRUNEI DARUSSALAM'=>'BRUNEI DARUSSALAM',
				'BULGARIA'=>'BULGARIA',
				'BURKINA FASO'=>'BURKINA FASO',
				'BURUNDI'=>'BURUNDI',
				'CAMBODIA, KINGDOM OF'=>'CAMBODIA, KINGDOM OF',
				'CAMEROON'=>'CAMEROON',
				'CANADA'=>'CANADA',
				'CAPE VERDE'=>'CAPE VERDE',
				'CAYMAN ISLANDS'=>'CAYMAN ISLANDS',
				'CENTRAL AFRICAN REPUBLIC'=>'CENTRAL AFRICAN REPUBLIC',
				'CHAD'=>'CHAD',
				'CHILE'=>'CHILE',
				'CHINA, PEOPLES REPUBLIC OF (MAINLAND CHINA)'=>'CHINA, PEOPLES REPUBLIC OF (MAINLAND CHINA)',
				'COLOMBIA'=>'COLOMBIA',
				'COMOROS'=>'COMOROS',
				'CONGO'=>'CONGO',
				'CONGO, DEMOCRATIC REPUBLIC OF'=>'CONGO, DEMOCRATIC REPUBLIC OF',
				'COOK ISLANDS'=>'COOK ISLANDS',
				'COSTA RICA'=>'COSTA RICA',
				'COTE D IVOIRE'=>'COTE D IVOIRE',
				'CROATIA'=>'CROATIA',
				'CUBA'=>'CUBA',
				'CYPRUS'=>'CYPRUS',
				'CZECH REPUBLIC'=>'CZECH REPUBLIC',
				'DENMARK'=>'DENMARK',
				'DJIBOUTI, REPUBLIC OF'=>'DJIBOUTI, REPUBLIC OF',
				'DOMINICA, COMMONWEALTH OF'=>'DOMINICA, COMMONWEALTH OF',
				'DOMINICAN REPUBLIC'=>'DOMINICAN REPUBLIC',
				'ECUADOR'=>'ECUADOR',
				'EGYPT'=>'EGYPT',
				'EL SALVADOR'=>'EL SALVADOR',
				'EQUATORIAL GUINEA'=>'EQUATORIAL GUINEA',
				'ERITREA'=>'ERITREA',
				'ESTONIA'=>'ESTONIA',
				'ETHIOPIA'=>'ETHIOPIA',
				'FALKLAND ISLANDS (MALVINAS)'=>'FALKLAND ISLANDS (MALVINAS)',
				'FAROE ISLANDS'=>'FAROE ISLANDS',
				'FIJI'=>'FIJI',
				'FINLAND'=>'FINLAND',
				'FRANCE'=>'FRANCE',
				'FRENCH GUIANA'=>'FRENCH GUIANA',
				'FRENCH POLYNESIA'=>'FRENCH POLYNESIA',
				'FRENCH WEST INDIES'=>'FRENCH WEST INDIES',
				'GABON'=>'GABON',
				'GAMBIA'=>'GAMBIA',
				'GEORGIA'=>'GEORGIA',
				'GERMANY'=>'GERMANY',
				'GHANA'=>'GHANA',
				'GIBRALTAR'=>'GIBRALTAR',
				'GREECE'=>'GREECE',
				'GREENLAND'=>'GREENLAND',
				'GRENADA'=>'GRENADA',
				'GUADELOUPE'=>'GUADELOUPE',
				'GUAM'=>'GUAM',
				'GUATEMALA'=>'GUATEMALA',
				'GUERNSEY'=>'GUERNSEY',
				'GUINEA'=>'GUINEA',
				'GUINEA BISSAU'=>'GUINEA BISSAU',
				'GUYANA'=>'GUYANA',
				'HAITI'=>'HAITI',
				'HONDURAS'=>'HONDURAS',
				'HONG KONG'=>'HONG KONG',
				'HUNGARY'=>'HUNGARY',
				'ICELAND'=>'ICELAND',
				'INDIA'=>'INDIA',
				'INDONESIA'=>'INDONESIA',
				'IRAN'=>'IRAN',
				'IRAQ'=>'IRAQ',
				'IRELAND'=>'IRELAND',
				'ISLE OF MAN'=>'ISLE OF MAN',
				'ISRAEL'=>'ISRAEL',
				'ITALY'=>'ITALY',
				'JAMAICA'=>'JAMAICA',
				'JAPAN'=>'JAPAN',
				'JERSEY'=>'JERSEY',
				'JORDAN'=>'JORDAN',
				'KAZAKHSTAN'=>'KAZAKHSTAN',
				'KENYA'=>'KENYA',
				'KIRIBATI'=>'KIRIBATI',
				'KOREA, DEMOCRATIC PEOPLES REPUBLIC OF'=>'KOREA, DEMOCRATIC PEOPLES REPUBLIC OF',
				'KOREA, REPUBLIC OF'=>'KOREA, REPUBLIC OF',
				'KUWAIT'=>'KUWAIT',
				'KYRGYZSTAN'=>'KYRGYZSTAN',
				'LAOS'=>'LAOS',
				'LATVIA'=>'LATVIA',
				'LEBANON'=>'LEBANON',
				'LESOTHO'=>'LESOTHO',
				'LIBERIA'=>'LIBERIA',
				'LIBYA'=>'LIBYA',
				'LIECHTENSTEIN'=>'LIECHTENSTEIN',
				'LITHUANIA'=>'LITHUANIA',
				'LUXEMBOURG'=>'LUXEMBOURG',
				'MACAU'=>'MACAU',
				'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
				'MADAGASCAR'=>'MADAGASCAR',
				'MALAWI'=>'MALAWI',
				'MALAYSIA'=>'MALAYSIA',
				'MALDIVES'=>'MALDIVES',
				'MALI'=>'MALI',
				'MALTA'=>'MALTA',
				'MAURITANIA'=>'MAURITANIA',
				'MAURITIUS'=>'MAURITIUS',
				'MAYOETTE'=>'MAYOETTE',
				'MEXICO'=>'MEXICO',
				'MICRONESIA, FEDERATED STATES OF'=>'MICRONESIA, FEDERATED STATES OF',
				'MOLDOVA, REPUBLIC OF'=>'MOLDOVA, REPUBLIC OF',
				'MONACO'=>'MONACO',
				'MONGOLIA'=>'MONGOLIA',
				'MONTENEGRO'=>'MONTENEGRO',
				'MONTSERRAT'=>'MONTSERRAT',
				'MOROCCO'=>'MOROCCO',
				'MOZAMBIQUE'=>'MOZAMBIQUE',
				'MYANMAR'=>'MYANMAR',
				'NAMIBIA'=>'NAMIBIA',
				'NEPAL'=>'NEPAL',
				'NETHERLANDS'=>'NETHERLANDS',
				'NETHERLANDS ANTILLES'=>'NETHERLANDS ANTILLES',
				'NEW CALEDONIA'=>'NEW CALEDONIA',
				'NEW ZEALAND'=>'NEW ZEALAND',
				'NICARAGUA'=>'NICARAGUA',
				'NIGER'=>'NIGER',
				'NIGERIA'=>'NIGERIA',
				'NORFOLK ISLAND'=>'NORFOLK ISLAND',
				'NORTHERN MARIANA ISLANDS'=>'NORTHERN MARIANA ISLANDS',
				'NORWAY'=>'NORWAY',
				'NOT APPLICABLE'=>'NOT APPLICABLE',
				'OMAN, SULTANATE OF'=>'OMAN, SULTANATE OF',
				'PAKISTAN'=>'PAKISTAN',
				'PALAU, REPUBLIC OF'=>'PALAU, REPUBLIC OF',
				'PALESTINIAN TERRITORY'=>'PALESTINIAN TERRITORY',
				'PANAMA, REPUBLIC OF'=>'PANAMA, REPUBLIC OF',
				'PAPUA NEW GUINEA'=>'PAPUA NEW GUINEA',
				'PARAGUAY'=>'PARAGUAY',
				'PERU'=>'PERU',
				'PHILIPPINES'=>'PHILIPPINES',
				'POLAND'=>'POLAND',
				'PORTUGAL'=>'PORTUGAL',
				'QATAR'=>'QATAR',
				'REUNION (LA)'=>'REUNION (LA)',
				'ROMANIA'=>'ROMANIA',
				'RUSSIA'=>'RUSSIA',
				'RWANDA, REPUBLIC OF'=>'RWANDA, REPUBLIC OF',
				'SAMOA'=>'SAMOA',
				'SAN MARINO, REPUBLIC OF'=>'SAN MARINO, REPUBLIC OF',
				'SAO TOME AND PRINCIPE'=>'SAO TOME AND PRINCIPE',
				'SATELLITE (GLOBAL)'=>'SATELLITE (GLOBAL)',
				'SATELLITE (REGIONAL)'=>'SATELLITE (REGIONAL)',
				'SAUDI ARABIA'=>'SAUDI ARABIA',
				'SENEGAL'=>'SENEGAL',
				'SERBIA'=>'SERBIA',
				'SEYCHELLES'=>'SEYCHELLES',
				'SIERRA LEONE'=>'SIERRA LEONE',
				'SINGAPORE'=>'SINGAPORE',
				'SLOVAKIA'=>'SLOVAKIA',
				'SLOVENIA'=>'SLOVENIA',
				'SOLOMON ISLANDS'=>'SOLOMON ISLANDS',
				'SOMALIA'=>'SOMALIA',
				'SOUTH AFRICA'=>'SOUTH AFRICA',
				'SPAIN'=>'SPAIN',
				'SRI LANKA'=>'SRI LANKA',
				'ST KITTS & NEVIS'=>'ST KITTS & NEVIS',
				'ST LUCIA'=>'ST LUCIA',
				'ST PIERRE ET MIQUELON'=>'ST PIERRE ET MIQUELON',
				'ST VINCENT AND THE GRENADINES'=>'ST VINCENT AND THE GRENADINES',
				'SUDAN'=>'SUDAN',
				'SURINAME'=>'SURINAME',
				'SWAZILAND'=>'SWAZILAND',
				'SWEDEN'=>'SWEDEN',
				'SWITZERLAND'=>'SWITZERLAND',
				'SYRIA'=>'SYRIA',
				'TAIWAN'=>'TAIWAN',
				'TAJIKISTAN'=>'TAJIKISTAN',
				'TANZANIA'=>'TANZANIA',
				'THAILAND'=>'THAILAND',
				'TIMOR L\'ESTE'=>'TIMOR L\'ESTE',
				'TOGO'=>'TOGO',
				'TONGA'=>'TONGA',
				'TRINIDAD AND TOBAGO'=>'TRINIDAD AND TOBAGO',
				'TUNISIA'=>'TUNISIA',
				'TURKEY'=>'TURKEY',
				'TURKMENISTAN'=>'TURKMENISTAN',
				'TURKS & CAICOS ISLANDS'=>'TURKS & CAICOS ISLANDS',
				'UGANDA'=>'UGANDA',
				'UKRAINE'=>'UKRAINE',
				'UNITED ARAB EMIRATES'=>'UNITED ARAB EMIRATES',
				'UNITED KINGDOM'=>'UNITED KINGDOM',
				'USA'=>'USA',
				'URUGUAY'=>'URUGUAY',
				'UZBEKISTAN'=>'UZBEKISTAN',
				'VANUATU'=>'VANUATU',
				'VENEZUELA'=>'VENEZUELA',
				'VIETNAM'=>'VIETNAM',
				'VIRGIN ISLANDS (US)'=>'VIRGIN ISLANDS (US)',
				'YEMEN'=>'YEMEN',
				'ZAMBIA'=>'ZAMBIA',
				'ZIMBABWE '=>'ZIMBABWE ',
				);
	}
	public function teamDinnerList(){
		return array(
				
			''=>'Please select',
			'ANZ'=>'ANZ',
			'Americas Major Accounts – EU Public Sector'=>'Americas Major Accounts – EU Public Sector',
			'Americas Major Accounts – HTTP East'=>'Americas Major Accounts – HTTP East',
			'Americas Major Accounts – HTTP West'=>'Americas Major Accounts – HTTP West',
			'Americas Major Accounts – Northeast EU/Invest'=>'Americas Major Accounts – Northeast EU/Invest',
			'Americas Major Accounts – Northwest EU'=>'Americas Major Accounts – Northwest EU',
			'Americas Major Accounts – South EU'=>'Americas Major Accounts – South EU',
			'Americas Major Accounts – Brazil Sales'=>'Americas Major Accounts – Brazil Sales',
			'Americas SAO'=>'Americas SAO',
			'Americas SMB'=>'Americas SMB',
			'Asia'=>'Asia',
			'Emerging Markets – India & CEEMEA'=>'Emerging Markets – India & CEEMEA',
			'Client Partner Group'=>'Client Partner Group',
			'Europe Sales'=>'Europe Sales',
			'Event Sales'=>'Event Sales',
			'Operating Committee'=>'Operating Committee',
			'Japan Sales '=>'Japan Sales ',
		);
	}
	public function menuList(){
		return array(
				'Meat'=>'Meat Option',
				'Fish'=>'Fish Option',
				'Vegetarian'=>'Vegetarian Option',
		);
	}
	public function galaMenuList(){
		return array(
				'Cottage Pie'=>'Upside Down Cottage Pie',
				'Cod'=>'Miso Black Cod',
				'Ravioli'=>'Open Faced Ravioli',
				);
	}
	public function gala_dinner_menuText(){
		$options = $this->galaMenuList();
		return isset($options[$this->gala_dinner_menu])?$options[$this->gala_dinner_menu]:'';
	}
	public function galaDinnerMenuList(){
		return array(
		1=>'Appetizer
Spiced Seared Tuna
Wakami Salad, Yuzo Ice, Sesame Ice
 
Entrée
Up Side-Down “Cottage Pie”
“Guinness” Glazed Beef Short Rib, Truffled Mashed Potato, White Cheddar Gratin,
Pickled Root Vegetables
 
Dessert
Roasted Pineapple Cheesecake',
				2=>'Appetizer
Spiced Seared Tuna
Wakami Salad, Yuzo Ice, Sesame Ice
 
Entrée

 Baingan Bharta “Open Faced Ravioli” (v) (Vegan)
Smoked Eggplant Pulp, Sweet Garlic, Red Chili, Turmeric, Cumin, Fresh Cilantro
 
 
Dessert
Roasted Pineapple Cheesecake',
				3=>'Appetizer
Spiced Seared Tuna
Wakami Salad, Yuzo Ice, Sesame Ice
 
Entrée
 
Miso Black Cod
Succotash (no chorizo), Cranberry Bean, Pickled Root Vegetable, Leon Allioli
Set on a Bed of Truffled White Bean Puree
 
Dessert
Roasted Pineapple Cheesecake');
	}
	public function beforeSave(){
		parent::beforeSave();
		if($this->status!=0 && $this->checkSave && !in_array($this->getScenario(),array('checkin','gift','search'))){
			throw new CHttpException(404,'The email has already been registered, or this is a wrong link.');
			return false;
		}
		$this->credit_card_number = $this->encode($this->credit_card_number);
		$this->csv_number = $this->encode($this->csv_number);
		return true;
	}
	public function afterSave(){
		parent::afterSave();
		if($this->status == 3){
			Yii::app()->db->createCommand()->execute("delete from tour_users where user_id = $this->id");
			Yii::app()->db->createCommand()->execute("delete from wishlists where user_id = $this->id");
		}
	}
	public function afterFind(){
		parent::afterFind();
		$this->credit_card_number = $this->decode($this->credit_card_number);
		$this->csv_number = $this->decode($this->csv_number);
		$this->statusName = $this->getStatusText();
	}
	public function galaDinnerVipList(){
		return array(
				'Not Gala Dinner VIP'=>'Not Gala Dinner VIP',
				'Gala Dinner VIP'=>'Gala Dinner VIP'
				);
	}
	
	public function printAttribute($attribute){
		if($attribute=='status'){
			echo $this->getStatusText();
		}elseif($attribute=="has_guest"){
			echo $this->getHasGuestText();
		}else{
			echo CHtml::encode($this->$attribute);
		}
	}
	public function displayCreditCardNumber(){
		if(strlen($this->credit_card_number)>4){
			$card_number = str_repeat('*',strlen($this->credit_card_number)-4);
			$card_number .= substr($this->credit_card_number,-4,4);
		}else{
			$card_number = $this->credit_card_number;
		}
		echo $card_number;
	}
	public function destinationList(){
		return array(
				//''=>'Please select',
				'Sydney'=>'Sydney',
				//'Fort Lauderdale'=>'Fort Lauderdale',
		);
	}
	public function getRoomType(){
		$hotels = Hotel::model()->findAll();
		$result = array();
		foreach($hotels as $hotel){
			$result[$hotel->id] = $hotel->hotel_name . ' - ' . $hotel->name; 
		}
		return $result;
	}
	public function getHotelTypeOptions(){
		return CHtml::listData(Hotel::model()->findAllBySql("select distinct(concat(hotel_name,' - ' ,name)) as type from hotels") , 'type','type');
		/**
			return array(
					'Presidential Suite'=>'Presidential Suite',
					'Sorrento Ocean Front 1 bedroom Suite'=>'Sorrento Ocean Front 1 bedroom Suite',
					'Sorrento Ocean View 1 bedroom'=>'Sorrento Ocean View 1 bedroom',
					'Ocean View Balcony'=>'Ocean View Balcony',
					'Tresor Ocean View 1 Bedroom High Floor'=>'Tresor Ocean View 1 Bedroom High Floor',
					'Tresor Ocean View 1 Bedroom Lower Floor'=>'Tresor Ocean View 1 Bedroom Lower Floor',
					'Deluxe or better  water views'=>'Deluxe or better  water views',
					'Standard ($299)'=>'Standard ($299)',
					'Standard ($325)'=>'Standard ($325)',
					'Hospitality Suite'=>'Hospitality Suite',
			);
			*/
	}
	
	public function getRoomRate(){
		$hotel = Hotel::model()->findByAttributes(array('name'=>$this->hotel_type));
		if($hotel === null){
			return 0;
		}else{
			return $hotel->room_rate;
		}
		/**
		if($this->hotel_type=='Presidential Suite'){
			return 359;
		}elseif($this->hotel_type=='Sorrento Ocean Front 1 bedroom Suite'){
			return 749;
		}elseif($this->hotel_type=='Sorrento Ocean View 1 bedroom'){
			return 649;
		}elseif($this->hotel_type=='Tresor Ocean View 1 Bedroom High Floor'){
			return 549;
		}elseif($this->hotel_type=='Tresor Ocean View 1 Bedroom Lower Floor'){
			return 549;
		}elseif($this->hotel_type=='Deluxe or better  water views'){
			return 359;
		}elseif($this->hotel_type=='Standard ($299)'){
			return 299;
		}elseif($this->hotel_type=='Standard ($325)'){
			return 325;
		}elseif($this->hotel_type=='Hospitality Suite'){
			return 0;
		}
		*/
	}
	public function getMasterBlockRoom($hotel){
		$criteria = new CDbCriteria();
		$criteria->condition = "hotel.hotel_name = :hotel_name and t.is_master = 1";
		$criteria->order = 'hotel_id asc,date asc';
		$criteria->params = array(':hotel_name'=>$hotel);
		$rooms = Room::model()->with('hotel')->findAll($criteria);
		$block = array();
		foreach($rooms as $room){
			$block[$room->hotel->name][$room->date] = $room->number;
		}
		return $block;
	}
	public function getBlockRoom($hotel){
		$criteria = new CDbCriteria();
		$criteria->condition = "hotel.hotel_name = :hotel_name";
		$criteria->order = 'hotel_id asc,date asc';
		$criteria->params = array(':hotel_name'=>$hotel);
		$rooms = Room::model()->with('hotel')->findAll($criteria);
		$block = array();
		foreach($rooms as $room){
			$block[$room->hotel->name][$room->date] = $room->number;
		}
		/**
		$block['Presidential Suite']['Apr/14/2013'] = 2;
		$block['Presidential Suite']['Apr/15/2013'] = 2;
		$block['Presidential Suite']['Apr/16/2013'] = 2;
		$block['Presidential Suite']['Apr/17/2013'] = 2;
		$block['Presidential Suite']['Apr/18/2013'] = 2;
		$block['Presidential Suite']['Apr/19/2013'] = 2;
		$block['Presidential Suite']['Apr/20/2013'] = 2;
		
		$block['Sorrento Ocean Front 1 bedroom Suite']['Apr/13/2013'] = 2;
		$block['Sorrento Ocean Front 1 bedroom Suite']['Apr/14/2013'] = 3;
		$block['Sorrento Ocean Front 1 bedroom Suite']['Apr/15/2013'] = 3;
		$block['Sorrento Ocean Front 1 bedroom Suite']['Apr/16/2013'] = 18;
		$block['Sorrento Ocean Front 1 bedroom Suite']['Apr/17/2013'] = 18;
		$block['Sorrento Ocean Front 1 bedroom Suite']['Apr/18/2013'] = 18;
		$block['Sorrento Ocean Front 1 bedroom Suite']['Apr/19/2013'] = 18;
		$block['Sorrento Ocean Front 1 bedroom Suite']['Apr/20/2013'] = 18;
		
		$block['Sorrento Ocean View 1 bedroom']['Apr/12/2013'] = 1;
		$block['Sorrento Ocean View 1 bedroom']['Apr/13/2013'] = 1;
		$block['Sorrento Ocean View 1 bedroom']['Apr/14/2013'] = 1;
		$block['Sorrento Ocean View 1 bedroom']['Apr/15/2013'] = 1;
		$block['Sorrento Ocean View 1 bedroom']['Apr/16/2013'] = 4;
		$block['Sorrento Ocean View 1 bedroom']['Apr/17/2013'] = 10;
		$block['Sorrento Ocean View 1 bedroom']['Apr/18/2013'] = 10;
		$block['Sorrento Ocean View 1 bedroom']['Apr/19/2013'] = 10;
		$block['Sorrento Ocean View 1 bedroom']['Apr/20/2013'] = 10;
		$block['Sorrento Ocean View 1 bedroom']['Apr/21/2013'] = 1;
		
		$block['Ocean View Balcony']['Apr/13/2013'] = 1;
		$block['Ocean View Balcony']['Apr/14/2013'] = 1;
		$block['Ocean View Balcony']['Apr/15/2013'] = 2;
		$block['Ocean View Balcony']['Apr/16/2013'] = 7;
		$block['Ocean View Balcony']['Apr/17/2013'] = 22;
		$block['Ocean View Balcony']['Apr/18/2013'] = 22;
		$block['Ocean View Balcony']['Apr/19/2013'] = 22;
		$block['Ocean View Balcony']['Apr/20/2013'] = 22;
		
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/13/2013'] = 1;
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/14/2013'] = 2;
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/15/2013'] = 4;
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/16/2013'] = 25;
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/17/2013'] = 25;
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/18/2013'] = 25;
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/19/2013'] = 25;
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/20/2013'] = 25;
		$block['Tresor Ocean View 1 Bedroom High Floor']['Apr/21/2013'] = 2;
		
		$block['Tresor Ocean View 1 Bedroom Lower Floor']['Apr/14/2013'] = 1;
		$block['Tresor Ocean View 1 Bedroom Lower Floor']['Apr/15/2013'] = 1;
		$block['Tresor Ocean View 1 Bedroom Lower Floor']['Apr/16/2013'] = 45;
		$block['Tresor Ocean View 1 Bedroom Lower Floor']['Apr/17/2013'] = 45;
		$block['Tresor Ocean View 1 Bedroom Lower Floor']['Apr/18/2013'] = 45;
		$block['Tresor Ocean View 1 Bedroom Lower Floor']['Apr/19/2013'] = 45;
		$block['Tresor Ocean View 1 Bedroom Lower Floor']['Apr/20/2013'] = 45;
		
		$block['Deluxe or better  water views']['Apr/13/2013'] = 4;
		$block['Deluxe or better  water views']['Apr/14/2013'] = 8;
		$block['Deluxe or better  water views']['Apr/15/2013'] = 14;
		$block['Deluxe or better  water views']['Apr/16/2013'] = 48;
		$block['Deluxe or better  water views']['Apr/17/2013'] = 520;
		$block['Deluxe or better  water views']['Apr/18/2013'] = 520;
		$block['Deluxe or better  water views']['Apr/19/2013'] = 520;
		$block['Deluxe or better  water views']['Apr/20/2013'] = 520;
		$block['Deluxe or better  water views']['Apr/21/2013'] = 11;
		$block['Deluxe or better  water views']['Apr/22/2013'] = 2;
		$block['Deluxe or better  water views']['Apr/23/2013'] = 1;
		
		$block['Standard ($299)']['Apr/11/2013'] = 1;
		$block['Standard ($299)']['Apr/12/2013'] = 8;
		$block['Standard ($299)']['Apr/13/2013'] = 20;
		$block['Standard ($299)']['Apr/14/2013'] = 20;
		$block['Standard ($299)']['Apr/15/2013'] = 20;
		$block['Standard ($299)']['Apr/16/2013'] = 20;
		$block['Standard ($299)']['Apr/17/2013'] = 20;
		$block['Standard ($299)']['Apr/18/2013'] = 20;
		$block['Standard ($299)']['Apr/19/2013'] = 20;
		$block['Standard ($299)']['Apr/20/2013'] = 20;
		$block['Standard ($299)']['Apr/21/2013'] = 20;
		
		$block['Standard ($325)']['Apr/10/2013'] = 2;
		$block['Standard ($325)']['Apr/11/2013'] = 2;
		$block['Standard ($325)']['Apr/12/2013'] = 5;
		$block['Standard ($325)']['Apr/13/2013'] = 17;
		$block['Standard ($325)']['Apr/14/2013'] = 29;
		$block['Standard ($325)']['Apr/15/2013'] = 33;
		$block['Standard ($325)']['Apr/16/2013'] = 33;
		$block['Standard ($325)']['Apr/17/2013'] = 35;
		$block['Standard ($325)']['Apr/18/2013'] = 35;
		$block['Standard ($325)']['Apr/19/2013'] = 33;
		$block['Standard ($325)']['Apr/20/2013'] = 32;
		$block['Standard ($325)']['Apr/21/2013'] = 19;
		
		$block['Hospitality Suite']['Apr/16/2013'] = 1;
		$block['Hospitality Suite']['Apr/17/2013'] = 1;
		$block['Hospitality Suite']['Apr/18/2013'] = 1;
		$block['Hospitality Suite']['Apr/19/2013'] = 1;
		$block['Hospitality Suite']['Apr/20/2013'] = 1;
		*/
		
		return $block;
	}
	
	public function getAttritonRates($hotel){
		$criteria = new CDbCriteria();
		$criteria->condition = "hotel_name = :hotel_name";
		$criteria->params = array(':hotel_name'=>$hotel);
		$hotels = Hotel::model()->findAll($criteria);
		return CHtml::listData($hotels,'name','attriton_rate');
		/**
		return array(
				'Presidential Suite'=>'359.00',
				'Sorrento Ocean Front 1 bedroom Suite'=>'749.00',
				'Sorrento Ocean View 1 bedroom'=>'649.00',
				'Ocean View Balcony'=>'359.00',
				'Tresor Ocean View 1 Bedroom High Floor'=>'549.00',
				'Tresor Ocean View 1 Bedroom Lower Floor'=>'549.00',
				'Deluxe or better  water views'=>'359.00',
				'Standard ($299)'=>'299.00',
				'Standard ($325)'=>'325.00',
				'Hospitality Suite'=>'699.00',
				);
				*/
	}
	public function getSellRates($hotel){
		$criteria = new CDbCriteria();
		$criteria->condition = "hotel_name = :hotel_name";
		$criteria->params = array(':hotel_name'=>$hotel);
		$hotels = Hotel::model()->findAll($criteria);
		return CHtml::listData($hotels,'name','sell_rate');
		/**
		return array(
				'Presidential Suite'=>'462.95',
				'Sorrento Ocean Front 1 bedroom Suite'=>'852.95',
				'Sorrento Ocean View 1 bedroom'=>'752.95',
				'Ocean View Balcony'=>'462.95',
				'Tresor Ocean View 1 Bedroom High Floor'=>'652.95',
				'Tresor Ocean View 1 Bedroom Lower Floor'=>'652.95',
				'Deluxe or better  water views'=>'462.95',
				'Standard ($299)'=>'402.95',
				'Standard ($325)'=>'428.95',
				'Hospitality Suite'=>'758.95',
		);
		*/
	}
	
	public function getDinnerByTeam($teamDinner){
		$dinnerArr = array(
				'Europe Sales'=>'10 oz Prime NY Strip Steak|Pan Roasted Florida Red Snapper|Homemade Cavatelli Pasta',
				'Japan Sales '=>'Grilled Wagyu beef with soy and virgin olive oil gravy|Florida Yellow Tail Snapper |Vegetarian green curry with thai eggplant and seasonal vegetables.',
				'Americas Major Accounts – South EU'=>'Prime sirloin of beef, potato torta & oxtail sugo|Mediterranean branzino baby vegetables & almond butter brodetto|Home made spaghetti with market fresh tomato & basil',
				'Americas Major Accounts – HTTP East'=>'Ny Sirloin Bisteca with roasted shallots, red wine jus|American Red Snapper with cherry tomatoes salad|Spaghetti Pomadoro  Sweet Tomatoes, Basil, Shaved Parmesan',
				'Americas Major Accounts – HTTP West'=>'Ny Sirloin Bisteca with roasted shallots, red wine jus|American Red Snapper with cherry tomatoes salad|Spaghetti Pomadoro  Sweet Tomatoes, Basil, Shaved Parmesan',
				'Americas SAO'=>'Back in Black skirt steak with creamy kale and glazed roots.|Roasted King Salmon, glazed with bell pepper compote.|Hand rolled strigoli pasta with crookneck squash & asparagus.',
				'Americas Major Accounts – Northeast EU/Invest'=>'Prime sirloin of beef, potato torta & oxtail sugo|Mediterranean branzino baby vegetables & almond butter brodetto|Home made spaghetti with market fresh tomato & basil',
				'Americas Major Accounts – EU Public Sector'=>'Prime sirloin of beef, potato torta & oxtail sugo|Mediterranean branzino baby vegetables & almond butter brodetto|Home made spaghetti with market fresh tomato & basil',
				'Asia'=>'Char-grilled filet mignon|Crab Crusted Mahi Mahi with leeks and sauteed baby spinach|Angel Hair Mediterranean pasta with grilled portobello mushrooms',
				'Client Partner Group'=>'Char-grilled filet mignon|Crab Crusted Mahi Mahi with leeks and sauteed baby spinach|Angel Hair Mediterranean pasta with grilled portobello mushrooms',
				'ANZ'=>"Filet Mignon|Chilean Sea Bass|Chef's Vegetarian option of the day",
				'Emerging Markets – India & CEEMEA'=>"Filet Mignon|Grilled Wild King Salmon with garlic mash|Chef's Vegetarian option of the day",
				'Americas Major Accounts – Brazil Sales'=>'New York strip with peppercorn sauce|Grilled local snapper with heirloom tomato salad |Parmesan gnocchi with poached green beans and creamed spinach.',
				'Americas Major Accounts – Northwest EU'=>'Bincho Charcoal Grilled Black Angus Tenderloin|Sea Bass with Maple Eggplant|Grilled Portobello mushroom with couscous and spinach',
				'Americas SMB'=>'C.A.B. Filet Mignon|Snapper w/ Citrus Buer Blanc|Pasta Primavera with a selection of fresh vegetables',
				'Event Sales'=>'Grilled Filet Mignon, Creekstone beef served with gorgonzola beet salad|Seared Yellowfin tuna with beet and jicama salad.|Three mushroom risotto, roasted shitake, portabello and porcini, alba white truffle oil',
				);
		if(isset($dinnerArr[$teamDinner])){
			return $dinnerArr[$teamDinner];
		}else{
			return '';
		}
	}
	
	public function getRestaurantByTeam($teamDinner){
		$restaurants = array(
				'Europe Sales'=>'Gotham',
				'Japan Sales '=>'The Setai',
				'Americas Major Accounts – South EU'=>'Scarpetta',
				'Americas Major Accounts – HTTP East'=>'Delano',
				'Americas Major Accounts – HTTP West'=>'Delano',
				'Americas SAO'=>'Barton G, The Restaurant',
				'Americas Major Accounts – Northeast EU/Invest'=>'Scarpetta',
				'Americas Major Accounts – EU Public Sector'=>'Scarpetta',
				'Asia'=>'Quinns',
				'Client Partner Group'=>'Quinns',
				'ANZ'=>'Prime Italian',
				'Emerging Markets – India & CEEMEA'=>'Prime 112',
				'Americas Major Accounts – Brazil Sales'=>'The Betsey',
				'Americas Major Accounts – Northwest EU'=>'Juvia',
				'Americas SMB'=>'Red The Steakhouse',
				'Event Sales'=>'The Forge',
				);
		if(isset($restaurants[$teamDinner])){
			return $restaurants[$teamDinner];
		}else{
			return '';
		}
	}
	public function getHeadsetList($type){
		return array(
				'headset11'=>'headset11',
				'headset12'=>'headset12',
				'headset13'=>'headset13',
				'headset14'=>'headset14',
				);
	}
	public function getAmountList(){
		$amount = 0;
		switch ($this->type){
			case 'Winners':
				$amount = 250;
				break;
			case 'Host GEN':
				$amount = 250;
				break;
			case 'Host GVP':
				$amount = 250;
				break;
			case 'Operating Committee':
				$amount = 250;
				break;
			case 'Top Achievers':
				$amount = 400;
				break;
			case 'Eagles':
				$amount = 400;
				break;
		}
		if($this->has_guest == 1){
			$amount = $amount * 2;
		}
		return array(
				$amount=>$amount,
		);
	}
	public function getTravelCommentStatus(){
		return array(
				'Finish'=>'Finish',
				'Pending'=>'Pending',
				'Working'=>'Working',
				);
	}
	public function getVisaStatus(){
		return array(
				'Not applied'=>'Not applied',
				'Applying'=>'Applying',
				'Pending'=>'Pending',
				'Completed'=>'Completed',
				);
	}
	public function getBillingInstructionByType($type){
		$arr = array(
			"Operating Committee"=>"Room ,tax, hotel fee  & Incidentals to Master acct. ",
			'Host GVP'=>'For core dates (10th - 13th April Inclusive)Room ,tax, hotel fee to Master acct.  Guest to pay for own incidentals. Extended dates either side at guests own expense.',
			'Host GEN'=>'For core dates (10th - 13th April Inclusive)Room ,tax, hotel fee to Master acct.  Guest to pay for own incidentals. Extended dates either side at guests own expense.',
			'Top Achievers'=>'For core dates (9th -13th April Inclusive) Room ,tax, hotel fee to Master acct.  Guest to pay for own incidentals. Extended dates either side at guests own expense.',
			'Eagles'=>'For core dates(9th - 13th April Inclusive) Room ,tax, hotel fee to Master acct.  Guest to pay for own incidentals. Extended dates either side at guests own expense.',
			'Winners'=>'For core dates (10th - 13th April Inclusive) Room ,tax, hotel fee to Master acct.  Guest to pay for own incidentals. Extended dates either side at guests own expense.',
			'Crew'=>'Room, tax, hotel fee to Master acct.  Guest to pay for own incidentals. ',
			);
		return isset($arr[$type])?$arr[$type]:'';
	}
}
