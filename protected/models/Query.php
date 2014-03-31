<?php

/**
 * This is the model class for table "querys".
 *
 * The followings are the available columns in table 'querys':
 * @property string $id
 * @property string $staff_name
 * @property string $full_name
 * @property string $contact_telephone
 * @property string $contact_email
 * @property string $hotel
 * @property string $nature
 * @property string $details
 * @property string $outcome
 * @property string $created_at
 * @property integer $created_by
 * @property string $updated_at
 * @property integer $updated_by
 * @property string $comment
 * @property string $status
 */
class Query extends TrackStarActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Query the static model class
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
		return 'querys';
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
			array('staff_name, full_name, contact_telephone, contact_email, hotel, nature', 'length', 'max'=>255),
			array('created_at, updated_at', 'safe'),
			array('details,outcome,comment','length','max'=>65535),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, staff_name, full_name, contact_telephone, contact_email, hotel, nature, details, outcome, created_at, created_by, updated_at, updated_by, comment, status', 'safe', 'on'=>'search'),
			array('staff_name,full_name,nature,details','required'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'staff_name' => 'Authorised By',
			'full_name' => 'Full Name',
			'contact_telephone' => 'Contact Telephone',
			'contact_email' => 'Contact Email',
			'hotel' => 'Hotel / Room Number',
			'nature' => 'Nature Of Query (please tick)',
			'details' => 'Details Of Query',
			'outcome' => 'Outcome Of Query',
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
		$criteria->compare('staff_name',$this->staff_name,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('contact_telephone',$this->contact_telephone,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('hotel',$this->hotel,true);
		$criteria->compare('nature',$this->nature,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('outcome',$this->outcome,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function natureOptions(){
		return array(
				'TRAVEL'=>'TRAVEL',
				'HOUSING'=>'HOUSING',
				'REGISTRATION'=>'REGISTRATION',
				'BADGES'=>'BADGES',
				'OTHER'=>'OTHER',
				);
	}
		public function getTravelCommentStatus(){
		return array(
				
				'Pending'=>'Pending',
				'Working'=>'Working',
				'Finish'=>'Finish',
				);
	}
}