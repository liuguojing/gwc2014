<?php

/**
 * This is the model class for table "tours".
 *
 * The followings are the available columns in table 'tours':
 * @property string $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $price
 * @property string $duration
 * @property string $minimum
 * @property string $maximum
 * @property string $begin_date
 * @property string $end_date
 * @property integer $ampm 0:am,1:pm,2:am or pm,3 am + pm
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class Tour extends TrackStarActiveRecord
{
	public $order;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tour the static model class
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
		return 'tours';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('ampm', 'length', 'max'=>15),
			array('name, image, duration, minimum, maximum', 'length', 'max'=>255),
			array('begin_date, end_date', 'length', 'max'=>11),
			array('type', 'length', 'max'=>10),
			array('name,image,category,type,description','required'),
			array('description, price, created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category, name, image, description, price, duration, minimum, maximum, begin_date, end_date, ampm, created_at, created_by, updated_at, updated_by', 'safe', 'on'=>'search'),
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
				'seats' => array(self::HAS_MANY,'TourSeat','tour_id'),
				'users' => array(self::MANY_MANY,'User','tour_users(tour_id,user_id)'),
				'tourUsers' => array(self::HAS_MANY,'TourUser','tour_id'),
				'wishlists' => array(self::HAS_MANY,'Wishlist','tour_id'),
				'tourGuests' => array(self::HAS_MANY,'TourGuest','tour_id'),
				'wishlistsGuests' => array(self::HAS_MANY,'WishlistsGuest','tour_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'image' => 'Image',
			'description' => 'Description',
			'price' => 'Price',
			'duration' => 'Duration',
			'minimum' => 'Minimum',
			'maximum' => 'Maximum',
			'begin_date' => 'Begin Date',
			'end_date' => 'End Date',
			'ampm' => 'Ampm',
			'created_at' => 'Created At',
			'created_by' => 'Created By',
			'updated_at' => 'Updated At',
			'updated_by' => 'Updated By',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('minimum',$this->minimum,true);
		$criteria->compare('maximum',$this->maximum,true);
		$criteria->compare('begin_date',$this->begin_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('ampm',$this->ampm);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function ampmOptions(){
		return array(0=>'am',
				1=>'pm',
				2=>'am or pm',
				3=>'am & pm(all day)',
				);
	}
	public function typeOptions(){
		return array(
				'T1'=>'Wallabies',
				'T2'=>'Kangaroos',
				);
	}
	
	public function categoryOptions(){
		return array(
				'Icons'=>'Icons',
				'Bike'=>'Bike',
				'Fauna & Flora'=>'Fauna & Flora',
				'Cooking'=>'Cooking',
				'City Icon'=>'City Icon',
				'Walking'=>'Walking',
				'Water'=>'Water',
				'Wildlife'=>'Wildlife',
				'Australian Animals'=>'Australian Animals',
				);
	}
	public function getAmpmText($ampm){
		$ampm_arr = $this->ampmOptions();
		return isset($ampm_arr[$ampm])?$ampm_arr[$ampm]:'';
	}
	
	public function makeTourSeats($tour){
		$tour_seats = TourSeat::model()->findAllByAttributes(array("tour_id"=>$tour->id));
		if($tour_seats === null){
			$tour->order = array();
			$from_date =  $this->strtodate($tour->begin_date);
			$end_date =  $this->strtodate($tour->end_date);
			
			$tmpDate = $from_date;
			while($tmpDate < $end_date ){
				if($tour->ampm == 0 || $tour->ampm == 2){
					$seat = new TourSeat;
					$seat->tour_id = $tour->id;
					$seat->ampm = 0;
					$seat->order_date = $tmpDate;
					$seat->total_seats = 20;
					$seat->optional_seats = 20;
					$seat->save();
				}
				if($tour->ampm == 1 || $tour->ampm == 2){
					$seat = new TourSeat;
					$seat->tour_id = $tour->id;
					$seat->ampm = 1;
					$seat->order_date = $tmpDate;
					$seat->total_seats = 20;
					$seat->optional_seats = 20;
					$seat->save();
				}
				if($tour->ampm == 3){
					$seat = new TourSeat;
					$seat->tour_id = $tour->id;
					$seat->ampm = 3;
					$seat->order_date = $tmpDate;
					$seat->total_seats = 20;
					$seat->optional_seats = 20;
					$seat->save();
				}
				$tmpDate = date('Y-m-d',strtotime($tmpDate)+3600*24);
			}
			return true;
		}else{
			return false;
		}
	}
}