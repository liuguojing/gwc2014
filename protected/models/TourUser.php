<?php

/**
 * This is the model class for table "tour_users".
 *
 * The followings are the available columns in table 'tour_users':
 * @property string $tour_id
 * @property string $user_id
 * @property string $order_date
 * @property integer $ampm
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class TourUser extends TrackStarActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TourUser the static model class
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
		return 'tour_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tour_id, user_id', 'required'),
			array('created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('tour_id, user_id', 'length', 'max'=>10),
			array('order_date', 'length', 'max'=>11),
			array('ampm', 'length', 'max'=>15),
			array('seat_id,created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('seat_id,tour_id, user_id, order_date, ampm, created_at, created_by, updated_at, updated_by', 'safe', 'on'=>'search'),
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
				'tour'=>array(self::BELONGS_TO,'Tour','tour_id'),
				'seat'=>array(self::BELONGS_TO,'TourSeat','seat_id'),
				'user'=>array(self::BELONGS_TO,'User','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tour_id' => 'Tour',
			'user_id' => 'User',
			'order_date' => 'Order Date',
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

		$criteria->compare('tour_id',$this->tour_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('order_date',$this->order_date,true);
		$criteria->compare('ampm',$this->ampm);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}