<?php

/**
 * This is the model class for table "guests".
 *
 * The followings are the available columns in table 'guests':
 * @property string $id
 * @property string $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $relationship
 * @property string $telephone_number
 * @property string $email
 * @property string $date_of_birth
 * @property string $dietary_requirements
 * @property string $passport
 * @property string $special_requests
 * @property string $nationality
 * @property string $departure_date
 * @property string $return_date
 * @property string $airport_name
 * @property string $airport_code
 * @property string $hotel_arrival_date
 * @property string $hotel_departure_date
 * @property integer $room_type
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Guest extends TrackStarActiveRecord
{
	
	public $checkSave = true;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Guest the static model class
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
		return 'guests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id,first_name,last_name,ga_dateofbirth', 'required','on'=>'winner'),
			array('room_type, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('preferred_airline,frequent_flyer_number,user_id, departure_date, return_date, hotel_arrival_date, hotel_departure_date', 'length', 'max'=>20),
			array('first_name, last_name, relationship, telephone_number, email, date_of_birth, dietary_requirements, passport, special_requests, nationality, airport_name, airport_code, ga_passport, ga_dateofbirth, ga_firstname, ga_lastname, ga_gender, ga_card_number, ga_card_country, ga_card_expiration_date, ga_card_issue_date, ga_redress_number, destination_city, preferred_seat_request, preferred_airline_frequent_flyer_number, other, need_visa, visa_letter, checked, hotel_venue', 'length', 'max'=>255),
			array('preferred_name,driving,fi_status,fi_adate,fi_adate1,fi_aflight1,fi_afrom1,fi_ato1,fi_adep1,fi_aarr1,fi_adate2,fi_aflight2,fi_afrom2,fi_ato2,fi_adep2,fi_aarr2,fi_adate3,fi_aflight3,fi_afrom3,fi_ato3,fi_adep3,fi_aarr3,fi_ddate,fi_ddate1,fi_dflight1,fi_dfrom1,fi_dto1,fi_ddep1,fi_darr1,fi_ddate2,fi_dflight2,fi_dfrom2,fi_dto2,fi_ddep2,fi_darr2,fi_ddate3,fi_dflight3,fi_dfrom3,fi_dto3,fi_ddep3,fi_darr3,
					dietary_comment,created_at, updated_at,team_dinner,team_dinner_menu,team_dinner_dietary,gala_dinner_menu,gala_dinner_dietary', 'safe'),
			array('id,user_id','unsafe'),
			// The following rule is used by search().
			 // Please remove those attributes that should not be searched.
             array('id, user_id, first_name, last_name, relationship, telephone_number, email, date_of_birth, dietary_requirements, passport, special_requests, nationality, departure_date, return_date, airport_name, airport_code, hotel_arrival_date, hotel_departure_date, room_type, created_at, created_by, updated_at, updated_by, ga_passport, ga_dateofbirth, ga_firstname, ga_lastname, ga_gender, ga_card_number, ga_card_country, ga_card_expiration_date, ga_card_issue_date, ga_redress_number, destination_city, preferred_seat_request, preferred_airline_frequent_flyer_number, other, need_visa, visa_letter, checked, hotel_venue, team_dinner, team_dinner_menu, team_dinner_dietary, gala_dinner, gala_dinner_menu, gala_dinner_dietary, dietary_comment, frequent_flyer_number, preferred_airline, fi_status, fi_adate, fi_adate1, fi_aflight1, fi_afrom1, fi_ato1, fi_adep1, fi_aarr1, fi_adate2, fi_aflight2, fi_afrom2, fi_ato2, fi_adep2, fi_aarr2, fi_adate3, fi_aflight3, fi_afrom3, fi_ato3, fi_adep3, fi_aarr3, fi_ddate, fi_ddate1, fi_dflight1, fi_dfrom1, fi_dto1, fi_ddep1, fi_darr1, fi_ddate2, fi_dflight2, fi_dfrom2, fi_dto2, fi_ddep2, fi_darr2, fi_ddate3, fi_dflight3, fi_dfrom3, fi_dto3, fi_ddep3, fi_darr3, has_checkin, headset, has_gift, checkin_at, gift_at', 'safe', 
             		'on'=>'search'),
        	array('first_name,last_name,','required',
        			'on'=>'winner'),	
			array('airport_name,destination_city,departure_date,return_date,visa_letter,checked,ga_passport, ga_firstname, ga_lastname, ga_gender, 
					ga_card_number, ga_card_country, ga_card_expiration_date, ga_card_issue_date,ga_gender,visa_letter','required',
					'on'=>'travel'),
				
			array('driving','required','on'=>'driving'),
			array('team_dinner_menu,gala_dinner_menu','required','on'=>'tours'),
			array('has_checkin, has_gift, headset, checkin_at, gift_at','safe','on'=>'checkin'),
			array('no_gala_dinner,visa_status,permanent_home_address,place_of_birth','safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'user' => array(self::BELONGS_TO,'User','user_id'),
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
			'user_id' => 'User',
			'first_name' => 'Guest First Name(s) ( this will appear on their badge)',
			'last_name' => 'Guest Last Name(s)',
			'relationship' => 'Relationship',
			'telephone_number' => 'Telephone Number',
			'email' => 'Email',
			'date_of_birth' => 'Date Of Birth',
			'dietary_requirements' => 'Does your guest have any dietary requirements',
			'passport' => 'Passport',
			'special_requests' => 'Special Requests (access / allergies)',
			'nationality' => 'Nationality',
			'departure_date' => 'Departure Date',
			'return_date' => 'Return Date',
			'airport_name' => 'Preferred Departure Airport / City',
			'airport_code' => 'Closest Airport Code',
			'hotel_arrival_date' => 'Hotel Arrival Date',
			'hotel_departure_date' => 'Hotel Departure Date',
			'room_type' => 'Room Type',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
				
				'ga_passport' => 'Guest Passport Nationality',
				'ga_dateofbirth' => 'Guest Date of Birth <br/>(eg: Feb/14/1990)',
				'ga_firstname' => 'Guest Passport Legal ID First Name(s)',
				'ga_lastname' => 'Guest Passport Legal ID Last Name(s)',
				'ga_gender' => 'Guest Passport Gender',
				'ga_card_number' => 'Guest Passport / US Identity Card Number',
				'ga_card_country' => 'Guest Passport / US Identity Card Country of Issue',
				'ga_card_expiration_date' => 'Guest Passport / US Identity Card Expiration Date <br/>(eg: Feb/14/1990)',
				'ga_card_issue_date' => 'Guest Passport / US Identity Card Issue Date <br/>(eg: Feb/14/1990)',
				'ga_redress_number' => 'Guest Passport Redress Number (if applicable)',
				
				'other'=>'Is there any other information you need to communicate',
				'visa_letter'=>'Would you like the registration team to provide your guest a visa invitation letter?',
				'checked'=>'Have you checked if you need a visa?',
				'need_visa'=>'Do you need a Visa?',
				
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
				'headset'=>'Guest Gift Collection',
				'has_checkin'=>'Guest Checked-in',
				
				'no_gala_dinner'=>'Guest Not Attending Gala Dinner',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('telephone_number',$this->telephone_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('dietary_requirements',$this->dietary_requirements,true);
		$criteria->compare('passport',$this->passport,true);
		$criteria->compare('special_requests',$this->special_requests,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('departure_date',$this->departure_date,true);
		$criteria->compare('return_date',$this->return_date,true);
		$criteria->compare('airport_name',$this->airport_name,true);
		$criteria->compare('airport_code',$this->airport_code,true);
		$criteria->compare('hotel_arrival_date',$this->hotel_arrival_date,true);
		$criteria->compare('hotel_departure_date',$this->hotel_departure_date,true);
		$criteria->compare('room_type',$this->room_type);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function arrayToString(){
		if(is_array($this->checked)){
			$this->checked = implode(',',$this->checked);
		}
	}
	
	public function stringToArray(){
		if(!empty($this->checked)){
			$this->checked = explode(',',$this->checked);
		}
	}
	public function beforeValidate(){
		parent::beforeValidate();
		$this->arrayToString();
		return true;
	}
	public function gala_dinner_menuText(){
		$options = $this->galaDinnerMenuList();
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
	public function printAttribute($attribute){
			echo CHtml::encode($this->$attribute);
	}
	public function beforeSave(){
		parent::beforeSave();
		return true;
	}
	public function afterSave(){
		parent::afterSave();
		return true;
	}
	
}