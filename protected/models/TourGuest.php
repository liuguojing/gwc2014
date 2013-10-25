<?php

/**
 * This is the model class for table "tour_guests".
 *
 * The followings are the available columns in table 'tour_guests':
 * @property integer $id
 * @property integer $tour_id
 * @property integer $seat_id
 * @property integer $guest_id
 * @property string $order_date
 * @property string $ampm
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 */
class TourGuest extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tour_guests';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, tour_id, seat_id, guest_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('order_date', 'length', 'max'=>33),
			array('ampm', 'length', 'max'=>45),
			array('created_at, updated_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('seat_id,id, tour_id, seat_id, guest_id, order_date, ampm, created_at, created_by, updated_at, updated_by', 'safe', 'on'=>'search'),
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
				'guest'=>array(self::BELONGS_TO,'Guest','guest_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tour_id' => 'Tour',
			'seat_id' => 'Seat',
			'guest_id' => 'Guest',
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
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('tour_id',$this->tour_id,true);
		$criteria->compare('seat_id',$this->seat_id);
		$criteria->compare('guest_id',$this->guest_id,true);
		$criteria->compare('order_date',$this->order_date,true);
		$criteria->compare('ampm',$this->ampm,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TourGuest the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
