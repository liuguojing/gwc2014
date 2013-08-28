<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	
	public $user;
	public $domain = 'https://app.magictony-se.com/gwc2013/';
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public function string2array($string){
		$array = array();
		if(!empty($string)){
			$array = explode(',',$string);
		}
		return $array;
	}
	public function array2string($array){
		$string = '';
		if(is_array($array)){
			$string = implode(',',$array);
		}
		return $string;
	}
	
	/**
	 * sendmail
	 */
	public function sendMail($to,$title,$user,$view='email',$cc="") {
		require_once Yii::app()->basePath . '/extensions/ses/ses.php';
		$ses = new SimpleEmailService(Yii::app()->params['ses']['accessKey'], Yii::app()->params['ses']['secretKey']);
		$m = new SimpleEmailServiceMessage();
		$m->addReplyTo(Yii::app()->params['ses']['replyTo']);
		$m->setReturnPath(Yii::app()->params['ses']['returnPath']);
		$m->addTo($to);
		$m->setFrom(Yii::app()->params['ses']['from']);
		$m->setSubject($title);
		$m->setMessageFromString(NULL, Yii::app()->controller->renderPartial('application.views.user.'.$view, array('model'=>$user), true));

		// 再这里设置标题和内容编码
		$m->setSubjectCharset('UTF-8');
		$m->setMessageCharset('UTF-8');

		$result = $ses->sendEmail($m);
		Yii::log("ses sending email\t" . $to . "\t" . CJSON::encode($result),'info');
	}
	public function init(){
		if(!Yii::app()->user->isGuest){
			$this->user = User::model()->findByPk(Yii::app()->user->id);
		}else{
			$this->user = new User();
		}
	}
}