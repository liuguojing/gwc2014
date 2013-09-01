<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class HotelAdminIdentity extends CUserIdentity
{
	private $_id;
	private $_isAdmin; //是否具有管理权限
	private $_isUser; //是否是前台用户
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate() {
		$admin = Admin::model()->findByAttributes(array('email' => $this->username,'role'=>$this->password));
 		if ($admin === null) {
 			$this->errorCode = self::ERROR_USERNAME_INVALID;
 		} else {
 				$this->_id = $admin->id;
 				$isHotelAdmin = 1;
 				$cookie = new CHttpCookie('id',$admin->id);
 				$cookie->expire = time()+60*60*24*30;  //有限期30天
 				Yii::app()->request->cookies['id']=$cookie;
 				$this->setState('name', $admin->role);
 				$this->setState('email', $admin->email);
 				$this->setState('isAdmin', 0);
 				$this->setState('isUser' , 0);
 				$this->setState('isHotelAdmin' , $isHotelAdmin);
 				
 				$this->errorCode = self::ERROR_NONE;
 		}
		return !$this->errorCode;
	}
	
	public function getId() {
		return $this->_id;
	}
}